<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'id'                => 'required|integer',
            'name'              => 'required',
            'email'             => 'required|email',
            'address'           => 'required|min:3',
            'online_phone'      => 'required',
            'outline_phone'      => 'required',
            'size_unit'         => 'required',
            'price_unit'        => 'required',
            'file'              => 'sometimes|mimes:png,jpg,jpeg,gif'
        ];
    }
}
