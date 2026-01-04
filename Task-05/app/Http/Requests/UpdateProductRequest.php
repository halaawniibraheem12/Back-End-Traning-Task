<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
           'name'  => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'name')->ignore($this->route('product')->id),
            ],
            'price' => 'required|numeric|min:0.01|decimal:0,2',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'Product name is required.',
            'name.unique'    => 'This product name already exists.',
            'price.required' => 'Price is required.',
            'price.numeric'  => 'Price must be a valid number.',
            'price.min'      => 'Price must be greater than 0.',
            'price.decimal'  => 'Price must have up to 2 decimal places.',
            'category_id.required' => 'Category is required.',
            'category_id.exists'   => 'Selected category does not exist.',
        ];
    }
}