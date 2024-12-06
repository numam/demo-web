<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */

     protected $fillable = [
        'nama',
        'thumbnail',
        'konten',
     ];

    /**
    * image
    *
    * @return Attribute
    */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/artikels/' . $image),
        );
    }
}
