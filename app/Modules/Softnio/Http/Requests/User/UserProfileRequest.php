<?php

namespace App\Modules\Softnio\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
        $id = auth()->user() ? auth()->id() : '';
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone_number' => 'required|string|max:30',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,others',
            'is_correct' => 'in:0,1',
            'type' => 'nullable|string|max:100',
            'address_line_one' => 'nullable|string|max:255',
            'address_line_two' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:50',
            'upload_file' => 'nullable|max:2048',
        ];
    }
}
