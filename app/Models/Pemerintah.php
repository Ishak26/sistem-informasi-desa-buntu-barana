<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class Pemerintah extends Model
{
    use HasFactory;
   protected  $guarded=['id'];
   public static function fieldColomns(){
    $field=Schema::getColumnListing('pemerintahs');
    return Arr::except($field,[0,count($field)-2,count($field)-1]);
   }
}
