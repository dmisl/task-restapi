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
            'email' => ['required', new RFC2822],
            'phone' => ['required', 'string', 'starts_with:+380'],
            'position_id' => ['required', 'integer', 'exists:positions,id'],
            'photo' => ['required', 'file', 'mimes:jpeg,jpg', 'max:5120', 'dimensions:min_width=70,min_height=70'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'fails' => $validator->errors(),
            ], 422)
        );
    }
}
