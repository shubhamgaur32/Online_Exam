<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    protected $table = "students";
    protected $primaryKey = "id";
    protected $fillable = ['name','email','mobile_no','dob','exam','password','status'];
}
