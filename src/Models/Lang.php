<?php

namespace Omerhan\Spanel\Models;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    protected $fillable = ['dil', 'kisaltma', 'bayrak', 'order', 'active','title','keyw','desc'];
}
