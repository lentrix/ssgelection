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
        User::create([
            'idnum'=>'1683-1T96',
            'lname'=>'LENTERIA',
            'fname'=>'BENJIE',
            'program'=>'BSIT',
            'year'=>'4',
            'dept'=>'CAST',
            'email'=>'hawkmanlentrix@gmail.com',
            'email_verified_at'=>now(),
            'password'=>bcrypt('password123'),
            'is_admin' => 1
        ]);
    }
}
