<?php

namespace App\Http\Requests\Vendor;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class DispatchStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $product = Product::findOrFail($this->route('id'));
        if (auth()->user()->id == $product->user_id){
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
        return [
            'required' => 'required|integer|gte:1'
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

//            $product = Product::findOrFail($this->route('id'));
//
//            $dispatchs = $product->dispatchs()->where('status',config('enums.product_dispatch.shipped'))->get();
//
//            $dispatched = 0;
//            foreach ($dispatchs as $dispatch)
//            {
//                $dispatched = $dispatched + $dispatch->quantity;
//            }
//
//            if ($product->required < $this->required){
//                $validator -> errors() -> add('popup_error', 'You can only send the required number of items');
//            }elseif (($product->required-$dispatched) < $this->required){
//                $validator -> errors() -> add('popup_error', 'You have already dispatched required number of products');
//            }

        });

    }
}
