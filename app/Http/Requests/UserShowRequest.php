<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserShowRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'userId' => ['required', 'integer'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'userId' => $this->route('id'),
        ]);
    }

    public function attributes(): array
    {
        return [
            'userId' => 'User ID',
        ];
    }

    public function messages(): array
    {
        return [
            'userId.required' => 'The user ID is required.',
            'userId.integer' => 'The user ID must be an integer.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'The user with the requested id does not exist.',
                'fails' => $validator->errors(),
            ], 400)
        );
    }
}