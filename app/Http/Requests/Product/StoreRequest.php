<?php

namespace App\Http\Requests\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\TypeSize;
use App\Rules\UploadCount;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Gate::allows('isVendor') or Gate::allows('isAdmin')){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // return [
        //     'name'=>'string|required|max:255|regex:/^[a-zA-Z ]*$/',
        //     'quantity' => 'required|integer|gte:1',
        //     'price' => 'required|integer|gte:1',
        //     'description' => 'required|string',
        //     'thumbnail' => [new UploadCount(), 'nullable'],
        //     'thumbnail.*' =>  'image|max:1999',
        //     'featured_category' => 'nullable|string',
        //     'main_category' => 'required|string',
        //     'parent_category' => 'nullable|string',
        //     'parent_sub_category' => 'nullable|string',
        //     'length' => 'required|integer|gte:1|lte:30',
        //     'width' => 'required|integer|gte:1|lte:30',
        //     'height' => 'required|integer|gte:1|lte:30',
        //     'weight' => 'required|integer|gte:1|lte:140',
        //     'size' => 'required',
        //     'type_size' => 'required',
        //     'color' => 'required'
        // ];

        return [
            'name'=>'string|required|max:255|regex:/^[a-zA-Z ]*$/',
            'quantity' => 'required|integer|gte:1',
            'price' => 'required|numeric|gte:1',
            'description' => 'required|string',
            'thumbnail' =>'required',
            'thumbnail.*' =>  'image|max:1999',
            'featured_category' => 'nullable|string',
            'main_category' => 'required',
            'parent_category' => 'nullable',
            'parent_sub_category' => 'nullable',
            'length' => 'required|gte:1|lte:30',
            'width' => 'required|gte:1|lte:30',
            'height' => 'required|gte:1|lte:30',
            'weight' => 'required|gte:1|lte:140',
            'color' => 'required'
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


            $temp = [];

            // $type_sizes = TypeSize::all()->pluck('id')->toArray();
            // if (!in_array($this->type_size, $type_sizes)){
            //     $validator -> errors() -> add('popup_error', 'Please select a valid type size');
            // }

            // if ($this->type_size) {
            //     $typeSize = TypeSize::find($this->type_size);
            //     $sizes = Size::where('product_type', $typeSize->product_type)->pluck('id')->toArray();
            //     if (!isset($this->size) || count(array_intersect($this->size, $sizes)) == 0){
            //         $validator -> errors() -> add('popup_error', 'Please select a valid size');
            //     }
            // } else {
            //     $validator -> errors() -> add('popup_error', 'Please select a valid type size');
            // }

            $colors = Color::all()->pluck('id')->toArray();
            if (!isset($this->color) || count(array_intersect($this->color, $colors)) == 0){
                $validator -> errors() -> add('popup_error', 'Please select a valid color');
            }

            if (!in_array($this->main_category, config('enums.main_categories'))){
                $validator -> errors() -> add('popup_error', 'Please select a valid main category');
            }
            if ($this->parent_category != null){

                $cat = Category::where('main',$this->main_category)
                    ->where('name', $this->parent_category)->first();

                if ($cat != null){
                    array_push($temp, $cat->id);
                    $s_cat = $cat->child()->where('name', $this->parent_sub_category)->first();

                    if ($s_cat != null){
                        array_push($temp, $s_cat->id);
                    }
                }
            }

            if ($this->featured_category != null){
                $featured_cat = Category::where('main','Featured')
                    ->where('name',$this->featured_category)->first();
                $this->request->add(['featured'=>$featured_cat->name]);
                if ($featured_cat == null){
                    $validator -> errors() -> add('popup_error', 'Please select a valid featured category');
                }
            }else{
                $this->featured_category = null;
            }

            $girth = $this->length + $this->width + $this->height;
            if ($girth > 60){
                $validator -> errors() -> add('popup_error', 'Please select girth of 128 inches in total.Packages up to 150 lbs., 108" in length and 128" in length plus girth (L+2W+2H) can be shipped.');
            }

            $this->request->add(['category'=>$temp]);
        });

    }
}
