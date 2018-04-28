<?php

use Illuminate\Database\Seeder;

// Models
use App\Models\Admin;

class SuperAdminUserCreate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a Super Admin
        $super_admin = Admin::create([ 
            'first_name'    =>  'Saifur',
            'last_name'     =>  'Rahman',
            'email'         =>  'saifur.dohs@gmail.com',
            'password'      =>  'secret',
            'active'        =>  true,
            'role'          =>  'super-admin' // Super Admin
        ]);
    }
}
