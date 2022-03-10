<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCityRequest extends FormRequest
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
        $product = $this->route('product');
        dd($product);
        // dd($this->manager_id);
        return [
            'name' => [
                'required', 'min:4', 'max:100',
                // Rule::unique('cities', 'id')->ignore($this->id),
                //                'not_regex:<\s*a[^>]*>(.*?)<\s*/\s*a>'
            ],
            'manager_id' => [
                'exists:users,id',
                Rule::unique('cities', 'manager_id')->ignore(2),
                //'not_regex:<\s*a[^>]*>(.*?)<\s*/\s*a>'
            ],
        ];
    }
}
