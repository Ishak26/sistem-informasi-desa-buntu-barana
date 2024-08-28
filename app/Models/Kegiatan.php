<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class Kegiatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function FieldTable(){
        $field =Schema::getColumnListing('kegiatans');
        $result =Arr::except($field,[0,6,7]);
        return $result;
    }
}
