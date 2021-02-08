<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function user()
    {
        $this->belongsToMany(User::class)->withTimestamps();
    }
}
