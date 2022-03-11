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
        //to get city id to make it ignore if there is no updated ... i send it a a hidden input from html
        $cityID = $this->input('cityID');
        if ($this->input('manager_id') != 'optional') {
            $manager_id = [
                'exists:users,id',
                Rule::unique('cities', 'manager_id')->ignore($cityID),
            ];
        } else {
            $manager_id = ['nullable'];
        }
        return [
            'name' => [
                'required', 'min:4', 'max:100',
                Rule::unique('cities', 'id')->ignore($cityID),
                //                'not_regex:<\s*a[^>]*>(.*?)<\s*/\s*a>'
            ],
            'manager_id' => $manager_id
        ];
    }
}
