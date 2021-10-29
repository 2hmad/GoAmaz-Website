<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAdRequest extends FormRequest
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
            'product-url' => 'required',
            'product-image' => 'required',
            'product-title' => 'required',
            'product-price' => 'required',
            'currency' => 'required',
            'merchant-name' => 'required',
            'merchant-logo' => 'required'
        ];
    }
}
