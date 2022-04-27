<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddress extends FormRequest
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
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'address'=>'required|string|max:500',
            'app_address'=>'nullable|string|max:500',
            'city'=>'required|string',
            'region'=>'required|string',
            'country'=>'required|string',
            'zipcode'=>'required|string',
        ];
    }
}
