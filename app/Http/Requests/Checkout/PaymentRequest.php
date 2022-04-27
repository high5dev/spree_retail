<?php

namespace App\Http\Requests\Checkout;

use App\Helpers\Helper;
use App\Models\Address;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'name_on_card' => 'required|string',
            'stripeToken' => 'required|string',
            'address' => 'required|integer',
            'shipping_address_form' => 'required|string',
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
            $address = Address::find($this->address);

            if ($address !=null){
                if ($address->user_id == auth()->user()->id){
                    $this->request->add(['user_address'=>$address]);
                }else{
                    return redirect()->route('cart.index')->with('popup_success','Please select a valid address');
                }
            }else{
                return redirect()->route('cart.index')->with('popup_success','Please select a valid address');
            }

        });

    }
}
