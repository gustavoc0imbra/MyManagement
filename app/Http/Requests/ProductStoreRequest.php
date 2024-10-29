<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:App\Models\Product',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'nullable|string|max:255',
            'imgPath' => 'required|image',
            'costPrice' => 'required|decimal:0,2',
            'sellingPrice' => 'required|decimal:0,2',
        ];
    }

    public function messages(): array
    {
        return [
          'category_id' => [
              'integer' => 'Category not found.'
          ]
        ];
    }
}
