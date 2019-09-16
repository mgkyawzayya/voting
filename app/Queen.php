<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queen extends Model
{
    protected $fillable = [
        'name', 'section', 'photo', 'vote'
    ];
}
