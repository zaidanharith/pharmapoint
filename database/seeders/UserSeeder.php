<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Zaidan Harith',
            'username'=>'zaidan',
            'email'=>'myharithzaidan@gmail.com',
            'password'=>Hash::make('zaidan123'),
            'remember_token'=>Str::random(10)
        ]);

        User::create([
            'name'=>'Anggita Salsabilla',
            'username'=>'anggita',
            'email'=>'anggita@gmail.com',
            'password'=>Hash::make('admin123'),
            'remember_token'=>Str::random(10)
        ]);

        User::create([
            'name'=>'Chaira Nastya Warestri',
            'username'=>'chaira',
            'email'=>'chaira@gmail.com',
            'password'=>Hash::make('chaira123'),
            'remember_token'=>Str::random(10)
        ]);
    }
}
