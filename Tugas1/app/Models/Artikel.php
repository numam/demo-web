<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    /**
     * @var array
     *
     */

    protected $fillable = [
        'nama',
        'image',
        'konten'
    ];
}
