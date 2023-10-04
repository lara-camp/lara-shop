<?php

namespace App\Http\Requests\Made;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MadeStoreRequest extends FormRequest
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
                'required',
                Rule::unique('categories','name')->where('deleted_at',null),
            ],
        ];
    }
}
