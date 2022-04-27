<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CareerStore extends FormRequest
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
            "name" => 'required|string',
            "type" => 'required|string',
            "category" => 'required|string',
            "description" => 'required|string',
            "qualification" => 'required|string',
            "city" => 'required|string',
            "country" => 'required|string',
        ];
    }
}
