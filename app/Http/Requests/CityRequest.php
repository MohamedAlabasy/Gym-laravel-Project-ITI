<?php

namespace App\Http\Requests;

use App\Models\City;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Input\Input;

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
        if ($this->input('manager_id') != 'optional') {
            $manager_id = ['unique:cities,manager_id', 'exists:users,id'];
        } else {
            $manager_id = ['nullable'];
        }
        return [
            'name' => [
                'required', 'min:4', 'max:100', 'unique:cities,name',
            ],
            'manager_id' => $manager_id
        ];
    }
}
