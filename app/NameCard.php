<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NameCard extends Model
{
    protected $fillable = [
        'user_id', 'name', 'phone', 'email', 'status', 'education', 'description', 'avatar'
    ];

    
}
