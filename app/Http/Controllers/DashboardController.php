<?php

namespace App\Http\Controllers;


// panggil model

use App\Models\Category;
use App\Models\Item;


class DashboardController extends Controller
{


    /*
    =============================

    DASHBOARD

    =============================


    Menghitung data untuk laporan


    contoh:


    Perpustakaan:

    Total Buku
    Total Kategori


    Apotek:

    Total Obat
    Total Jenis Obat



    */


    public function index()
    {



        /*
        Menghitung jumlah kategori


        SQL:

        SELECT COUNT(*)
        FROM categories


        */


        $totalCategory =
            Category::count();





        /*
        Menghitung jumlah item


        */


        $totalItem =
            Item::count();






        /*
        Menghitung semua stok


        contoh:


        Barang A = 10
        Barang B = 5


        Total = 15


        */


        $totalStock =
            Item::sum('stock');







        return view(

            'dashboard',


            compact(

                'totalCategory',

                'totalItem',

                'totalStock'

            )

        );



    }


}
