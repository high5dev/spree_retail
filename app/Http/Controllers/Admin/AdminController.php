<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStore;
use App\Http\Requests\Admin\UserUpdate;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $role = Role::where('name','Admin')->first();

        $users = $role->users;


        return view('admin.dashboard.admin.index',compact('users'));
    }

    public function create()
    {
        //$categories = Category::all();

        return view('admin.dashboard.admin.create');
    }

    public function store(UserStore $request)
    {
        // $user = User::create([
        //     'first_name' => 'Ebose',
        //     'last_name' => 'Ogbidi',
        //     'email' => 'eboseisjoyin@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'status' => 'Active',
        //     'news_letter' => 0,
        // ]);
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'status' => 'Active',
            'news_letter' => 0,
        ]);


        DB::table('role_user')->insert(
            ['user_id' => $user->id, 'role_id' => 1]
        );
        //Create a profile for user
        Profile::create([
            'user_id' => $user->id,
        ]);


        return back()->with('popup_success','Admin has been created');

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


        return back()->with('popup_success','Admin has been Updated');

    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.dashboard.admin.edit',compact('user'));
    }
}
