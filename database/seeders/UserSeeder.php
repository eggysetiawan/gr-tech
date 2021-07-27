<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'email' => 'admin@grtech.com.my',
            'password' => bcrypt('password'),
        ];


        $user = [
            'email' => 'user@grtech.com.my',
            'password' => bcrypt('password'),
        ];

        User::create($admin);
        User::create($user);
    }
}
