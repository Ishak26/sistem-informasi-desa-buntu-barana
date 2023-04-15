<?php

namespace App\Models;

use App\Models\Komentar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function komentar(){
        return $this->hasMany(Komentar::class,'id_gambar');
    }
}
