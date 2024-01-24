<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        if ($this->has('in_stock')){
            $this->merge([
                'in_stock' => filter_var($this->get('in_stock'), FILTER_VALIDATE_BOOLEAN),
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'brand_id' => ['nullable', 'int', 'exists:brands,id'],
            'price' => ['nullable', 'int'],
            'in_stock' => ['nullable', 'boolean']
        ];
    }
}
