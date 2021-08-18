<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'nullable|string|max:8|min:8',
            'name' => 'required|string|unique:products|max:255',
            'code' => 'nullable|unique:products',
            'sell_price' => 'required',
            'subcategory_id' => 'required|string',
            'provider_id' => 'required|string',
        ];
    }
}