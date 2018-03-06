<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $primaryKey = 'ReviewID';
    protected $fillable = ['ProductID', 'comment'];
}
