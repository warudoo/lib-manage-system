<?php

namespace App\Models;


// factory user
use Database\Factories\UserFactory;


// attribute Laravel 13
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;


// auth Laravel
use Illuminate\Foundation\Auth\User as Authenticatable;


// factory & notification
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;





/*
|--------------------------------------------------------------------------
| USER MODEL
|--------------------------------------------------------------------------
|
| Model untuk data user login
|
| Field:
|
| name
| email
| password
| role
|
|
| Role:
|
| admin
|   - akses semua CRUD
|
| user
|   - akses terbatas
|
*/



#[Fillable([


    // nama user


    'name',





    // email login


    'email',






    // password user


    'password',





    // role akses:
    // admin / user


    'role',



])]




#[Hidden([


    // supaya password tidak tampil
    // ketika ambil data user


    'password',


    'remember_token'


])]



class User extends Authenticatable
{



    /** 
     * Factory untuk membuat data dummy
     */


    use HasFactory, Notifiable;





    /*

    Casting data


    password => hashed


    artinya Laravel otomatis encrypt


    */


    protected function casts(): array
    {


        return [


            'email_verified_at'
                =>
            'datetime',



            'password'
                =>
            'hashed',


        ];


    }



}
