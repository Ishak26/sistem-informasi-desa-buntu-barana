<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\penerimaBantuan;

class Bantuan extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function penerimabantuan(){
        return $this->belongsToMany(Penduduk::class,penerimaBantuan::class)->select('nama','nik')->withPivot(['status','buktiterima']);
    }
}
