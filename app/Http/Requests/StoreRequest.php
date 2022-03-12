<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = auth()->user();
        return [

            'name' => ['required', 'min:5',],
            'email' => 'required|string|unique:users,email,' . $user->id,
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg'],
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Overrided required msg',
            // 'name.min' => 'min rule msg changed',
        ];
    }
}
