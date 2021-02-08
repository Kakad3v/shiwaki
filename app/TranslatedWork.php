<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslatedWork extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public  function path()
    {
        // return route('tx-works-index') . '/' . $this->id;
    }
}
