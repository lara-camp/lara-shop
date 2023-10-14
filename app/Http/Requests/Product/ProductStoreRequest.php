<?php

namespace App\Http\Requests\Product;


use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'            => ["required",
                                    "max:30",
                                    "min:5",
                                    Rule::unique('products')->where(function($query){
                                        return $query
                                            ->where(
                                                "name",
                                                $this->name,
                                            )
                                            ->wherenull('deleted_at');
                                    })
            ],
            'price'           => ["required"],

            'stock'           => ["required",
                                    "integer",
            ],
            'width'           => ["required"],
            'height'          => ["required"],
            'depth'           => ["required"],
            'weight'          => ["required"],
            'made'            => ["required"],

            'description'     => ["required"],

            'category_id'     => ["required",
                                    "integer",
            ],

            'file'            => ["required",
                                    "file",
                                    "mimes:jpg,png,jpeg,gif,img"
            ],
        ];
    }
    public function messages(){
        return[
            'name.required'             => 'Product name cannot be empty',
            'name.max'                  => 'Product name lenght cannot be greater than 30',
            'name.min'                  => 'Product name lenght cannot be less than five',
            'name.unique'               => 'Product name is already exits',
            'price.required'            => 'Product price cannot be empty',
            'stock.required'            => 'Product stock cannot be empty',
            'width.required'            => 'Product width cannot be empty',
            'height.required'           => 'Product height cannot be empty',
            'weight.required'           => 'Product weight cannot be empty',
            'depth.required'            => 'Product depth cannot be empty',
            'stock.integer'             => 'Product stock must be integer',
            'description.required'      => 'Product description cannot be empty',
            'category_id.required'      => 'Product category cannot be empty',
            'category_id.numeric'       => 'Product category must be numeric',
            'file.required'             => 'Thumbnail cannot be empty',
            'file.mimes'                => 'Thumbnail extension is wrong!!',
        ];
    }

}
