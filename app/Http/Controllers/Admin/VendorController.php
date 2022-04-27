<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStore;
use App\Http\Requests\Admin\UserUpdate;
use App\Mail\VendorApplicationAccepted;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use App\Models\VendorProfile;
use App\Models\VendorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    public function index()
    {
        $role = Role::where('name','Vendor')->first();

        $users = $role->users;


        return view('admin.dashboard.vendor.index',compact('users'));
    }

    public function create()
    {
        //$categories = Category::all();

        return view('admin.dashboard.vendor.create');
    }

    public function store(UserStore $request)
    {
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'status' => 'Active',
            'news_letter' => 0,
        ]);


        DB::table('role_user')->insert(
            ['user_id' => $user->id, 'role_id' => 2]
        );
        //Create a profile for user
        Profile::create([
            'user_id' => $user->id,
        ]);

        $vendor_profile = VendorProfile::create([
            'user_id' => $user->id,
        ]);



        return back()->with('popup_success','Vendor has been created');

    }

    public function update(UserUpdate $request, $id)
    {

        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;

        if($request->filled('email') and $user->email != $request->email)
        {
            $check = User::where('email' ,'=', $request->email)->where('id','<>',$user->id)->count();
            if($check == 0)
            {
                $user->email = $request->email;
                $user->email_verified_at = null;
            }
            else{
                return back()->with('popup_error','Email already exists')->withInput();
            }
        }
        if($request->filled('password'))
        {
            $user->password = Hash::make($request->password);
        }

        $user->force_logout = 1;

        $user->save();


        return back()->with('popup_success','Vendor has been Updated');

    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.dashboard.vendor.edit',compact('user'));
    }

    public function vendorRequest()
    {
        $v_requests = VendorRequest::all();

        return view('admin.dashboard.vendor.request',compact('v_requests'));
    }

    public function vendorRequestAccept($id)
    {
        $v_request = VendorRequest::findOrFail($id);

        if ($v_request->status == config('enums.vendor_request_status.accepted')){
            return back()->with('popup_error','Request is already accepted');
        }elseif ($v_request->status == config('enums.vendor_request_status.rejected')){
            return back()->with('popup_error','Request is rejected once, system is not able to accept it now');
        }
        $v_request->status = config('enums.vendor_request_status.accepted');

        //check if user exists with same email
        $user = User::where('email',$v_request['contact_email'])->first();

        if ($user != null){
            $roles = $user->roles->pluck('name')->toArray();

            if(in_array('Vendor',$roles) or in_array('Admin',$roles))
            {
                return back()->with('popup_error','This email already belongs to vendor or a admin');
            }
        }

        $r_pass = Str::random(8);

        if ($user == null){
            //Create new user

            $user = User::create([
                'first_name' => $v_request['contact_name'],
                'last_name' => 'null',
                'email' => $v_request['contact_email'],
                'password' => Hash::make($r_pass),
                'status' => 'Active',
                'news_letter' => 0,
            ]);

            //change role to vendor

            DB::table('role_user')->insert(
                ['user_id' => $user->id, 'role_id' => 2]
            );
            Mail::send(new VendorApplicationAccepted($user,$r_pass));
        }else{
            $user->roles()->sync(2);

            $user->force_logout = 1;
            $user->password = Hash::make($r_pass);
            $user->save();

            Mail::send(new VendorApplicationAccepted($user,$r_pass));
        }


        $vendor_profile = VendorProfile::create([
            'user_id' => $user->id,
            'brand_name' => $v_request->brand_name,
            'brand_structure' => $v_request->structure,
            'brand_website' => $v_request->website_link
        ]);

        $v_request->save();

        return back()->with('popup_success','Request Status Changed');
    }

    public function vendorRequestReject($id)
    {
        $v_request = VendorRequest::findOrFail($id);

        if ($v_request->status == config('enums.vendor_request_status.rejected')){
            return back()->with('popup_error','Request is already Rejected');
        }elseif ($v_request->status == config('enums.vendor_request_status.accepted')){
            return back()->with('popup_error','Request is accepted once, system is not able to reject it now');
        }
        $v_request->status = config('enums.vendor_request_status.rejected');


        $v_request->save();


        return back()->with('popup_success','Request Status Changed');
    }
}
