<?php

namespace Database\Seeders;

use App\Models\VendorProfile;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11223344'),
            'status' => 'Active',
            'force_logout' => 0,
        ]);
        Profile::create([
            'user_id' => 1000000,
        ]);

        VendorProfile::create([
            'user_id' => 1000000,
            'brand_name' => 'Spree',
        ]);

        Role::create([
            'name' => 'Admin'
        ]);
        Role::create([
            'name' => 'Vendor'
        ]);
        Role::create([
            'name' => 'Standard'
        ]);

        DB::table('role_user')->insert(
            ['user_id' => 1000000, 'role_id' => 1]
        );

        User::create([
            'first_name' => 'Bilal',
            'last_name' => 'Aijaz',
            'email' => 'bilalaijaz.88@gmail.com',
            'password' => Hash::make('11223344'),
            'status' => 'Active',
            'force_logout' => 0,
        ]);

        Profile::create([
            'user_id' => 1000001,
        ]);
        DB::table('role_user')->insert(
            ['user_id' => 1000001, 'role_id' => 3]
        );

        User::create([
            'first_name' => 'Bilal',
            'last_name' => 'Aijaz',
            'email' => 'bilalaijaz.77@gmail.com',
            'password' => Hash::make('11223344'),
            'status' => 'Active',
            'force_logout' => 0,
        ]);

        Profile::create([
            'user_id' => 1000002,
        ]);
        DB::table('role_user')->insert(
            ['user_id' => 1000002, 'role_id' => 3]
        );
    }
}
