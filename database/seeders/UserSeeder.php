<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creation d un user type admin
        User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make("kais"),
            'role'=> User::ADMIN_ROLE,


        ]);
        User::create([
            'name'=>'kais',
            'email'=>'kaissahbi@gmail.com',
            'password'=>Hash::make("kais"),
            'role'=> User::USER_ROLE,


        ]);

    }
}
