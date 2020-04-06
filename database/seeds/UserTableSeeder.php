<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
            $user->name = 'admin name';
            $user->email = 'phungnhatphu4@gmail.com';
            $user->phone = '089795967';
            $user->address = 'cau giay';
            $user->password = bcrypt('12345678');
            $user->save();
            $user->roles()->attach(Role::where('name', 'admin')->first());

            $admin = new User;
            $admin->name = 'user name';
            $admin->email = 'phungnhatphu3@gmail.com';
            $user->phone = '089795965';
            $user->address = 'cau giay1';
            $admin->password = bcrypt('12345678');
            $admin->save();
            $admin->roles()->attach(Role::where('name', 'admin')->first());
    }
}
