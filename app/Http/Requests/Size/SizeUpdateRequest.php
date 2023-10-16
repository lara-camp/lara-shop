<?php

namespace App\Http\Requests\Size;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SizeUpdateRequest extends FormRequest
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
            'name' => [
                "required",
                "integer",
                Rule::unique('size')
                    ->where(function($query){
                    return $query
                           ->where(
                             "name",
                             $this->name,
                           )
                           ->wherenull('deleted_at');
                })->ignore($this->id),
            ]
        ];
    }
}
