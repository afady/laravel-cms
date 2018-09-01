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

    public function getRoleLevel($role_slug)
    {
        // using firstOrFail() because we want the app to break if the role is not found
        // this could only happen if a developer types an invalid role slug
        if ($role = Role::where('slug', $role_slug)->firstOrFail()) {
            return $role->level;
        }
    }
}
