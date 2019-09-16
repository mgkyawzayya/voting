<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class King extends Model
{
    protected $fillable = [
        'name', 'section', 'photo', 'vote'
    ];
}
