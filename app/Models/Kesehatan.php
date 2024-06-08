<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penduduk;

class Kesehatan extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function penduduk(){
       return $this->belongsTo(Penduduk::class);
    }
}
