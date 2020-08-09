<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUser extends FormRequest
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
            //
            'previlage' => 'required|integer',
            'agence_id' => 'required|integer',
            'user'      => 'required|string|min:3|unique:users',
            'first_name'=> 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'email'     => 'required|email',
            'password'  => 'required|min:8|max:20'
        ];
    }
}
