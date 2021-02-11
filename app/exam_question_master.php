<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam_question_master extends Model
{
    protected $table="exam_question_master";
    protected $primarykey='id';
    protected $fillable=['exam_id','question','ans','options','status'];
}
