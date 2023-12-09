<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('user');
        return [
            'name' => 'sometimes|string|max:255',
            'email' => [
                'sometimes',
                'string',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'mobile' => 'sometimes|max:20',
            'status' => 'nullable|boolean',
        ];
    }




    public function messages()
    {
        return [
            'status.boolean' => 'The status field must be true or false.',
        ];
    }
}
