<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login  extends AuthenticatableUser implements Authenticatable 
{
    use HasFactory;
    protected $table='logins';
   protected  $guarded=['id'];
}
