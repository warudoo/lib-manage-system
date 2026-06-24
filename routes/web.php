<?php

use Illuminate\Support\Facades\Route;

// Import controller agar route bisa mengakses class controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
|
| File ini mengatur semua alamat URL aplikasi
|
| Alur:
| URL → Route → Controller → Model → View
|
*/


// Halaman pertama diarahkan langsung ke dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});



/*
|--------------------------------------------------------------------------
| AUTH ROUTE
|--------------------------------------------------------------------------
|
| Semua route di dalam group ini wajib login.
|
| Jika belum login:
| user otomatis diarahkan ke halaman login.
|
*/

Route::middleware(['auth'])->group(function(){


    /*
    =========================
    DASHBOARD
    =========================

    URL:
    /dashboard

    Controller:
    DashboardController@index

    Fungsi:
    menampilkan ringkasan aplikasi
    */


    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');





    /*
    =========================
    ADMIN ROUTE
    =========================

    Middleware:
    auth  → cek sudah login
    admin → cek role admin


    Hanya admin yang bisa:
    - tambah data
    - edit data
    - hapus data


    User biasa tidak bisa akses URL ini.
    */


    Route::middleware('admin')->group(function(){



        /*
        =========================
        CATEGORY CRUD
        =========================

        Resource otomatis membuat:


        GET
        /categories

            index()


        GET
        /categories/create

            create()


        POST
        /categories

            store()


        GET
        /categories/{id}/edit

            edit()


        PUT
        /categories/{id}

            update()


        DELETE
        /categories/{id}

            destroy()



        Contoh perubahan:


        Perpustakaan:
            Category = Jenis Buku


        Apotek:
            Category = Jenis Obat


        Toko:
            Category = Kategori Produk

        */


        Route::resource(
            'categories',
            CategoryController::class
        );







        /*
        =========================
        ITEM CRUD
        =========================


        Item dibuat generic.


        Bisa diganti menjadi:


        Perpustakaan:
            Item = Buku


        Apotek:
            Item = Obat


        Inventory:
            Item = Barang


        */


        Route::resource(
            'items',
            ItemController::class
        );

        /*
        Kelola user hanya untuk admin

        Fitur:
        - lihat user
        - tambah user
        - edit role
        - hapus user
        */


        Route::resource(
            'users',
            UserController::class
        );


    });



});



// Route bawaan Laravel Breeze
// Berisi login, register, logout, forgot password

require __DIR__.'/auth.php';
