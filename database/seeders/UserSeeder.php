<?php

namespace Database\Seeders;


// panggil model user

use App\Models\User;


// untuk encrypt password

use Illuminate\Support\Facades\Hash;


use Illuminate\Database\Seeder;



class UserSeeder extends Seeder
{


    /*
    ==================================

    SEEDER USER ADMIN

    ==================================


    Fungsi:

    Membuat akun otomatis


    Contoh:

    Admin sistem
    Kasir
    Petugas


    */


    public function run(): void
    {


        User::create([


            'name' => 'Administrator',


            'email' => 'admin@gmail.com',


            'password' => Hash::make('password'),


            // akses tertinggi

            'role' => 'admin'


        ]);




        User::create([


            'name' => 'User Demo',


            'email' => 'user@gmail.com',


            'password' => Hash::make('password'),


            // akses biasa

            'role' => 'user'


        ]);


    }


}
