<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ['user_id', 'source', 'body', 'slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return 'nasaha/' . $this->id;
    }
}
