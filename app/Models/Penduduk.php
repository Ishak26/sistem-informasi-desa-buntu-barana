<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Penduduk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
   public function surat(){
    return $this->hasMany(Surat::class,'id_warga');
   }
   public function bantuan(){
    return $this->belongsToMany(Bantuan::class);
}
   protected function scopeSearch($query,array $filter ){
       $query->when($filter['filter'] ?? false ,function ($query,$filter){
        $columnFilter =Schema::getColumnListing('penduduks');
        foreach($columnFilter as $colomn){
            $result=$query->orWhere($colomn,'LIKE','%'.$filter.'%');
        }
        return $result;
        }     
    );
   }
}
