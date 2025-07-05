<?php

namespace App\Http\Requests;

use App\Http\Responses\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class SuggestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'selectedItems' => 'required|array|min:1',
            'selectedItems.*.selectedProduct' => 'required|string',
            'selectedItems.*.cost' => 'required|numeric|min:0',
            'selectedItems.*.sell' => 'required|numeric|min:0',
            'selectedItems.*.quantity' => 'required|integer|min:1',

            'allProducts' => 'required|array|min:1',

            'laborHours' => 'required|numeric|min:0',
            'laborCost' => 'required|numeric|min:0',
            'fixedOverheads' => 'required|numeric|min:0',

            'targetMargin' => 'required|numeric|min:0',
            'grossProfit' => 'required|numeric',
            'margin' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'selectedItems.required' => 'You must provide at least one product/service.',
            'selectedItems.*.selectedProduct.required' => 'Product name is required for each item.',
            'selectedItems.*.cost.required' => 'Cost is required for each item.',
            'selectedItems.*.sell.required' => 'Selling price is required for each item.',
            'selectedItems.*.quantity.required' => 'Quantity is required for each item.',
            'allProducts.required' => 'All products list is required.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            ApiResponse::validationError(
            $validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY
        )
        );
    }
}
