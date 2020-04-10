<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email', 'youssef.harizi@gmail.com')->first();
        if (!$user) {
            User::create([
                'name' => 'youssef',
                'email' => 'youssef.harizi@gmail.com',
                'role' => 'Admin',
                'password' => Hash::make('123456')
            ]);
        }
    }
}
