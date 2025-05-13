<?php

namespace App\Http\Requests;

use App\Rules\RFC2822;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:60'],
            'email' => ['required', new RFC2822, 'unique:users,email'],
            'phone' => ['required', 'string', 'starts_with:+380', 'unique:users,phone'],
            'position_id' => ['required', 'integer', 'exists:positions,id'],
            'photo' => ['required', 'file', 'mimes:jpeg,jpg', 'max:5120', 'dimensions:min_width=70,min_height=70'],
            'token' => ['nullable', 'string']
        ];
    }

    public function messages()
    {
        return [
            'photo.max' => 'The photo may not be greater than 5 Mbytes.'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        if (
            $validator->errors()->has('email') && $validator->errors()->first('email') === 'The email has already been taken.' ||
            $validator->errors()->has('phone') && $validator->errors()->first('phone') === 'The phone has already been taken.'
        ) {
            throw new HttpResponseException(
                response()->json([
                    'success' => false,
                    'message' => 'User with this phone or email already exist',
                ], 409)
            );
        }
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'fails' => $validator->errors(),
            ], 422)
        );
    }
}
