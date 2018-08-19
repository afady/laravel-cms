<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'title', 'slug', 'level',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
