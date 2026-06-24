<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{


    /*
    =========================
    LIST USER
    =========================

    Menampilkan semua akun

    */


    public function index()
    {

        $users = User::latest()
            ->get();


        return view(
            'users.index',
            compact('users')
        );

    }






    /*
    =========================
    FORM TAMBAH USER
    =========================
    */


    public function create()
    {

        return view('users.create');

    }






    /*
    =========================
    SIMPAN USER
    =========================
    */


    public function store(Request $request)
    {


        // validasi input

        $request->validate([

            'name'
                =>
            'required',


            'email'
                =>
            'required|email|unique:users',


            'password'
                =>
            'required|min:6',


            'role'
                =>
            'required'

        ]);






        /*
        Membuat akun baru

        password otomatis hash
        karena User Model punya:

        password => hashed

        */


        User::create([


            'name'
                =>
            $request->name,



            'email'
                =>
            $request->email,



            'password'
                =>
            $request->password,



            'role'
                =>
            $request->role


        ]);





        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User berhasil dibuat'
            );


    }








    /*
    =========================
    EDIT USER
    =========================
    */


    public function edit(User $user)
    {


        return view(
            'users.edit',
            compact('user')
        );


    }








    /*
    =========================
    UPDATE USER
    =========================
    */


    public function update(
        Request $request,
        User $user
    ){




        $user->update([


            'name'
                =>
            $request->name,


            'email'
                =>
            $request->email,


            'role'
                =>
            $request->role


        ]);





        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User berhasil diedit'
            );



    }









    /*
    =========================
    DELETE USER
    =========================
    */


    public function destroy(User $user)
    {



        $user->delete();



        return redirect()
            ->back()
            ->with(
                'success',
                'User berhasil dihapus'
            );


    }


}
