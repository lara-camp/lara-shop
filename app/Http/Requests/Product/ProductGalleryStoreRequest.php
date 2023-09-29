<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductGalleryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_id'   => ["required",
                            "integer",
            ],
            'file'      => ["required",
                            "file",
                            "mimes:jpg,png,jpeg,gif,img"
            ],
        ];
    }
    public function messages(){
        return[
            'product_id.required'  => 'Product id cannot be empty',
            'file.required'     => 'Product Gallery Image cannot be empty',
            'file.mimes'        => 'Product Gallery Image extension is wrong!!',
        ];
    }

}
