<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Characteristic;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'subcategory_id' => ['required', 'integer', 'exists:subcategories,id'],
        ];
    }
}
