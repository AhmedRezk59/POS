<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasPermission('create_products');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required' , 'string', 'unique:products,name'],
            'price_bought' => ['required' , 'numeric' ,'max:100000'],
            'price_sell' => ['required' , 'numeric' ,'max:100000'],
            'quantity' => ['required' , 'numeric' ,'min:1'],
            'category_id' => ['required' , 'integer','exists:categories,id'],
            'size_id' => ['required' , 'integer','exists:sizes,id']
        ];
    }
}
