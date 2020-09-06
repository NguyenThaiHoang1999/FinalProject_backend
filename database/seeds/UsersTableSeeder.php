<?php

use Illuminate\Database\Seeder;
use App\Admin;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin::truncate();

        // $adminRoles = Admin::where('roles','admin')->first();
        // $authorRoles = Admin::where('roles','author')->first();
        // $userRoles = Admin::where('roles','user')->first();

        Admin::create([
			'name' => 'hieutan',
			'email' => 'hieutan@gmail.com',
			'phone' => '0932023991',
            'password' => md5('123456'),
            'roles'=> 'admin'
            	
        ]);
        Admin::create([
			'name' => 'hieutan123',
			'email' => 'hieutan123@gmail.com',
			'phone' => '0932023992',
            'password' => md5('123456'),
            'roles'=> 'author'	
        ]);
       Admin::create([
			'name' => 'hieutan456',
			'email' => 'hieutan456@gmail.com',
			'phone' => '0932023993',
            'password' => md5('123456'),
            'roles'=> 'user'
        ]);

        // $admin->roles()->attach($adminRoles);
        // $author->roles()->attach($authorRoles);
        // $user->roles()->attach($userRoles);
    }
}
