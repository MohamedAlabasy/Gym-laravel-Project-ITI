<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'name' => [
                'required',
                'min:4', 'max:100', 'unique:cities,name'
                //                'not_regex:<\s*a[^>]*>(.*?)<\s*/\s*a>'
            ],
            'manager_id' => [
                'unique:cities,manager_id'
                //    'not_regex:<\s*a[^>]*>(.*?)<\s*/\s*a>'
            ],
        ];
    }
}
