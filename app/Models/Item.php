<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Item extends Model
{


    /*
    Field yang boleh create/update
    */


    protected $fillable = [

        'category_id',

        'name',

        'description',

        'stock',

        'price',

        'image'

    ];




    /*
    Relationship

    Item punya satu kategori

    */


    public function category()
    {

        return $this->belongsTo(
            Category::class
        );

    }



}
