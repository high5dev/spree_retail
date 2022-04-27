<?php

namespace App\Http\Requests\Admin;

use App\Models\Banner;
use Illuminate\Foundation\Http\FormRequest;

class BannerStoreRequest extends FormRequest
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
            'url' => 'required|string',
            'type' => 'required|integer|gte:1|lte:2',
//            'number' => 'nullable|integer|gte:1|lte:4',
            'image' => 'required|image'
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


            if ($this->type == 1)
            {
                $f_banner = Banner::where('type','Header')->get()->count();
                if ($f_banner >= 4){
                    $validator -> errors() -> add('popup_error', 'Only 4 header banner can exists at a time');
                }
            }

            if ($this->type == 2)
            {
                $f_banner = Banner::where('type','Footer')->first();
                if ($f_banner != null){
                    $validator -> errors() -> add('popup_error', 'One footer banner can exists at a time');
                }
            }
        });

    }
}
