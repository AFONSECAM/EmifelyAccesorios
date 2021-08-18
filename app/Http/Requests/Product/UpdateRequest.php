<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|unique:products,name,' . $this->route('product')->id . '',
            'code' => 'required|unique:products,code,' . $this->route('product')->id . '',
            'sell_price' => 'string',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'subcategory_id' => 'required|string',
            'provider_id' => 'required|string',
        ];
    }
}