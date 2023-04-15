<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class berita extends Model
{
    use HasFactory;


    protected $fillable = [
        'judul',
        'category_id',
        'gambar',
        'slug',
        'deskripsi',
        'time'
    ];
    // protected $guarded = ['id'];

    public function Category()
    {
        return $this->belongsTo(category::class);
    }


    // protected $guarded =
}
