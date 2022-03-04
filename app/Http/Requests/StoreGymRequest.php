<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
<<<<<<< HEAD:app/Http/Requests/StoreGymRequest.php
            'name' => ['required','string','min:2'],
=======


            //
>>>>>>> ee1d150688fd24bdafa12a660c6abde972147e16:app/Http/Requests/StoreRequest.php
        ];
    }
    public function messages()
    {
        return [];
    }
}
