<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'in_stock' => $this->has('in_stock'),
        ]);
    }
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'in_stock' => ['nullable', 'boolean'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer', 'max:2147483647'],
            'category_id' => ['required', 'integer', 'exists:subcategories,id'],
            'brand_id' => ['required', 'integer', 'exists:brands,id'],
        ];
    }
}
