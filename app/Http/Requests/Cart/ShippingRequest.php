<?php

namespace App\Http\Requests\Cart;

use App\Helpers\Helper;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
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
            'u_address'=>'nullable|integer'
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
            $user = auth()->user();
            $temp = new Helper();
            //if (!$temp->validatePostalCode($this->zipcode)){
               // $validator -> errors() -> add('popup_error', 'Please select a valid zip code');
            //}else{
                if ($this->u_address >= 1)
                {
                    $address = Address::where('id',$this->u_address)->first();


                    if ($address->user_id != auth()->user()->id){
                        $validator -> errors() -> add('popup_error', 'Please select a valid address');
                    }else{
                        $this->request->add(['check_address'=>1]);
                    }
                }else{
                    if ($user->address->count() >= 2){
                        $validator -> errors() -> add('popup_error', 'You cannot add more then 2 address at a time');
                    }else{
                        $this->request->add(['check_address'=>0]);
                    }
                }
            //}


        });
    }

    protected function update($address){
        $address->first_name = $this->first_name;
        $address->last_name = $this->last_name;
        $address->address = $this->address;
        $address->app_address = $this->app_address;
        $address->city = $this->city;
        $address->region = $this->region;
        $address->country = $this->country;
        $address->zipcode = $this->zipcode;

        $address->save();
    }
}
