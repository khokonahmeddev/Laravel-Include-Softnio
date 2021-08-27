<?php

namespace App\Modules\Softnio\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:8',
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'The passcode field is required.',
            'password.min' => 'The passcode must be at least 6 characters.',
            'password.max' => 'The passcode must not be greater than 30 characters.',

        ];
    }
}
