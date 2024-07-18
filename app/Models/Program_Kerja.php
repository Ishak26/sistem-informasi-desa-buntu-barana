<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_Kerja extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function Belanja(){
        return $this->hasMany(Belanja::class);
    }
    public function pengeluaran(){
        $pengeluaran=Pendapatan::where('bidang','KASI PEMERINTAHAN');
        return $pengeluaran;
    }
}
