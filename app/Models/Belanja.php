<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belanja extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function Program_Kerja(){
        return $this->belongsTo(Program_Kerja::class,'ProgramKerja_id');
    }
}
