<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    protected function prepareForValidation(): void
    {
        $this->request->remove('category_id');

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
            'subcategory_id' => ['required', 'integer', 'exists:subcategories,id'],
            'brand_id' => ['required', 'integer', 'exists:brands,id'],
            'images.*' => ['required', 'mimes:jpg,jpeg,png', 'max:2000'],
        ];
    }
}
