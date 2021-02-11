<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class portal extends Model
{
    protected $table = "portals";
    protected $primaryKey = "id";
    protected $fillable = ['name','email','mobile_no','password','status'];
}
