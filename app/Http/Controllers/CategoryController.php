<?php


namespace App\Http\Controllers;


// panggil model Category
use App\Models\Category;


// mengambil request dari form
use Illuminate\Http\Request;



class CategoryController extends Controller
{


    /*
    ==========================
    READ DATA
    ==========================

    Fungsi:
    Menampilkan semua kategori

    Contoh:
    Buku:
        Novel
        Komik

    Apotek:
        Antibiotik
        Vitamin

    */


    public function index(Request $request)
{


    /*
    =====================================
    FITUR SEARCH CATEGORY
    =====================================


    Mengambil keyword pencarian
    dari input form


    Contoh:


    URL:

    /categories?search=novel



    maka:


    $search = "novel"



    */


    $search = $request->search;





    /*
    Query database kategori


    Jika search kosong:

        tampil semua


    Jika ada isi:

        filter berdasarkan nama



    SQL contoh:


    SELECT *
    FROM categories
    WHERE name LIKE '%novel%'



    */


    $categories = Category::when(


            $search,


            function($query, $search){



                return $query->where(


                    'name',


                    'like',


                    "%{$search}%"



                );



            }



        )


        // data terbaru tampil atas

        ->latest()


        ->get();






    return view(


        'categories.index',


        compact(

            'categories',

            'search'

        )


    );



}






    /*
    ==========================
    HALAMAN TAMBAH DATA
    ==========================

    */

    public function create()
    {


        return view(

            'categories.create'

        );


    }







    /*
    ==========================
    SIMPAN DATA
    ==========================

    Data dari form masuk ke sini

    */


    public function store(Request $request)
    {



        /*
        Validasi input

        name:
        - wajib diisi
        - maksimal 255 karakter

        */


        $request->validate([


            'name'
                =>
            'required|max:255'


        ]);





        /*
        INSERT DATA

        SQL:

        INSERT INTO categories(name)
        VALUES(...)

        */


        Category::create([


            'name'
                =>
            $request->name


        ]);






        return redirect()

            ->route('categories.index')

            ->with(
                'success',
                'Data berhasil ditambah'
            );


    }







    /*
    ==========================
    EDIT DATA
    ==========================

    */

    public function edit(Category $category)
    {


        return view(


            'categories.edit',


            compact('category')


        );


    }









    /*
    ==========================
    UPDATE DATA
    ==========================

    */


    public function update(
        Request $request,
        Category $category
    )
    {


        $request->validate([


            'name'
                =>
            'required|max:255'


        ]);






        /*
        UPDATE categories

        */


        $category->update([



            'name'
                =>
            $request->name



        ]);






        return redirect()

            ->route('categories.index')

            ->with(
                'success',
                'Data berhasil diedit'
            );


    }









    /*
    ==========================
    DELETE DATA
    ==========================

    */


    public function destroy(Category $category)
    {



        /*
        DELETE FROM categories

        */


        $category->delete();




        return redirect()

            ->back()

            ->with(
                'success',
                'Data berhasil dihapus'
            );


    }



}
