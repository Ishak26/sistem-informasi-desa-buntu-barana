<?php

namespace App\Models;


class Berita 
{
    private static $berita = 
 [
    [
        'kategori'=>'gotong royong',
        'baca'=>'berita-pertama',
        'gambar'=>'ALBUM.jpg',
        'judulberita'=>'judul satu',
        'deskripsi'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur possimus cupiditate soluta, vel repudiandae aperiam ea qui beatae, debitis hic earum culpa, consectetur sapiente nostrum expedita? Eius esse libero velit!'
    ],
   [
        'kategori'=>'acara',
         'baca'=>'berita-kedua',
        'gambar'=>'ALBUM2.jpg',
        'judulberita'=>'judul kedua',
        'deskripsi'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, possimus sunt maiores dolores saepe eveniet cum reprehenderit sed enim iure. Voluptatibus praesentium numquam voluptas! Reruma'
   ],
     [
        'kategori'=>'acara',
         'baca'=>'berita-ketiga',
        'gambar'=>'ALBUM2.jpg',
        'judulberita'=>'Judul ketiga',
        'deskripsi'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, possimus sunt maiores dolores saepe eveniet cum reprehenderit sed enim iure. Voluptatibus praesentium numquam voluptas! Reruma'
   ]
   ];


public static function all(){
    return collect( self::$berita);
}
public static function getBaca($baca){
 
 $array = static::all();
//  mengambildata menggunakan array
  //   $array=[];
  // foreach ( self::$berita as $new) {
  //   if($new["baca"]===$baca){
  //      $array= $new;
 

   // }
 // }
//   var_dump($array);
    // return self::$berita[0];
    return $array->firstwhere('baca',$baca);
}



}









