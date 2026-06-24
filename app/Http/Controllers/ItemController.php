<?php

namespace App\Http\Controllers;


// panggil model yang digunakan
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


// mengambil data dari form
use Illuminate\Http\Request;



class ItemController extends Controller
{



    /*
    =================================================

    READ DATA ITEM

    =================================================


    Fungsi:
    Menampilkan semua data item


    Contoh:

    Perpustakaan:

    Item:
        Laravel Dasar

    Category:
        Programming



    Apotek:

    Item:
        Paracetamol

    Category:
        Obat Demam



    */



    public function index(Request $request)
{


    /*
    =================================

    SEARCH DATA

    =================================


    Request mengambil input pencarian


    contoh URL:

    /items?search=laptop


    maka:

    $request->search = laptop


    */



    $search = $request->search;





    /*
    Query item


    with('category')

    mengambil data relasi kategori


    */


    $items = Item::with('category')



        /*

        Jika ada pencarian,
        jalankan where


        contoh:


        search = "Laravel"


        SQL:

        SELECT *
        FROM items
        WHERE name LIKE '%Laravel%'


        */


        ->when($search, function($query, $search){



            return $query->where(

                'name',

                'like',

                "%{$search}%"

            );



        })



        ->latest()

        ->get();






    return view(

        'items.index',

        compact(

            'items',

            'search'

        )


    );



}



    /*
    =================================================

    HALAMAN TAMBAH ITEM

    =================================================


    Kenapa perlu category?

    Karena ketika tambah item
    user memilih kategori


    */


    public function create()
    {



        /*
        Mengambil semua kategori

        contoh:

        Dropdown:

        - Novel
        - Komik
        - Programming

        */



        $categories =
            Category::all();





        return view(

            'items.create',

            compact('categories')

        );



    }










    /*
    =================================================

    SIMPAN DATA ITEM

    =================================================


    Alur:

    Form Tambah

        ↓

    Request

        ↓

    Validation

        ↓

    Database



    */



    public function store(Request $request)
{


    /*
    Validasi input termasuk gambar
    */


    $request->validate([

        'category_id' => 'required',

        'name' => 'required',

        'stock' => 'required|numeric',

        'price' => 'required|numeric',

        'image' => 'nullable|image|max:2048'

    ]);




    /*
    Jika user upload gambar

    maka simpan ke storage:

    storage/app/public/items

    */


    $image = null;


    if($request->hasFile('image')){


        $image = $request
            ->file('image')
            ->store(
                'items',
                'public'
            );


    }






    Item::create([

        'category_id'
            =>
        $request->category_id,


        'name'
            =>
        $request->name,


        'description'
            =>
        $request->description,


        'stock'
            =>
        $request->stock,


        'price'
            =>
        $request->price,


        'image'
            =>
        $image

    ]);






    return redirect()
        ->route('items.index')
        ->with(
            'success',
            'Item berhasil ditambah'
        );

}













    /*
    =================================================

    EDIT DATA ITEM

    =================================================



    */


    public function edit(Item $item)
    {




        /*
        Ambil kategori untuk dropdown edit


        */


        $categories =
            Category::all();






        return view(


            'items.edit',


            compact(

                'item',

                'categories'

            )


        );


    }











    /*
    =================================================

    UPDATE DATA ITEM

    =================================================


    */


    public function update(
        Request $request,
        Item $item
    )

    {



        /*
        Validasi ulang


        */


        $request->validate([


            'category_id'

                =>

            'required',



            'name'

                =>

            'required',



            'stock'

                =>

            'required|numeric',



            'price'

                =>

            'required|numeric'


        ]);








        /*
        UPDATE items

        */


        $item->update([




            'category_id'

                =>

            $request->category_id,




            'name'

                =>

            $request->name,





            'description'

                =>

            $request->description,





            'stock'

                =>

            $request->stock,





            'price'

                =>

            $request->price



        ]);








        return redirect()

            ->route('items.index')


            ->with(

                'success',

                'Item berhasil diedit'

            );



    }









    /*
    =================================================

    HAPUS ITEM

    =================================================

    */



    public function destroy(Item $item)
    {




        /*

        DELETE FROM items

        WHERE id = ?

        */


        $item->delete();






        return redirect()

            ->back()

            ->with(

                'success',

                'Item berhasil dihapus'

            );



    }




}
