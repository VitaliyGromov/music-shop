<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:256'],
            'lastname' => ['required', 'string', 'max:256'],
            'middlename' => ['required', 'string', 'max:256'],
            'email' => ['required', 'email', 'max:256', 'unique:users'],
            'role_id' => ['required', 'exists:roles,id'],
        ];
    }
}
