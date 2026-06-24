<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Category extends Model
{


    /*
    Data yang boleh masuk database
    */

    protected $fillable = [

        'name'

    ];




    /*
    Relationship OOP

    1 Category punya banyak Item

    contoh:

    Kategori Novel:
        - Harry Potter
        - Naruto


    */

    public function items()
    {

        return $this->hasMany(
            Item::class
        );

    }



}
