<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'John Doe',
            'email'=>'johndoe@test.app',
            'password'=> bcrypt('password'),
            'role_id'=>1,
            'school_id'=>1
        ]);
    }
}
