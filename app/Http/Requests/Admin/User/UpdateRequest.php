<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'active' => $this->has('active'),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:256'],
            'lastname' => ['required', 'string', 'max:256'],
            'middlename' => ['required', 'string', 'max:256'],
            'email' => ['required', 'email', 'max:256', 'unique:users'],
            'active' => ['nullable', 'boolean'],
            'role_id' => ['required', 'exists:roles,id'],
        ];
    }
}
