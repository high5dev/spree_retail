<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
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
            'name'=>'required|string|max:255|regex:/^[a-zA-Z ]*$/',
            'main_category' => 'required|string',
            'parent_category' => 'nullable|string',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {


            if (!in_array($this->main_category, config('enums.admin_categories'))){
                $validator -> errors() -> add('popup_error', 'Please select a valid main category');
            }
            if ($this->parent_category != null){
                $cat = Category::where('name',$this->parent_category)
                    ->where('main',$this->main_category)->first();

                if ($cat == null){
                    $validator -> errors() -> add('popup_error', 'Please select a valid parent category');
                }
            }


        });

    }
}
