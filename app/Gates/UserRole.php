<?php
namespace App\Gates;
use App\Models\User;
class UserRole
{
    public function rolesToSession(User $user)
    {
        if(!session()->exists('roles'))
        {
            $roles = $user->roles->pluck('name')->toArray();
            session(['roles' => $roles]);
        }
    }
    public function isAdmin(User $user)
    {
        $this->rolesToSession($user);
        $roles = session('roles');
        if(in_array('Admin',$roles))
        {
            return true;
        }
        return false;
    }

    public function notAdmin(User $user)
    {
        $this->rolesToSession($user);
        $roles = session('roles');
        if(in_array('Admin',$roles))
        {
            return false;
        }
        return true;
    }

    public function isStandard(User $user)
    {
        $this->rolesToSession($user);
        $roles = session('roles');
        if(in_array('Standard',$roles))
        {
            return true;
        }
        return false;
    }


    public function isVendor(User $user)
    {
        $this->rolesToSession($user);
        $roles = session('roles');
        if(in_array('Vendor',$roles))
        {
            return true;
        }
        return false;
    }

}
