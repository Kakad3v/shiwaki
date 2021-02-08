<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestFile extends Model
{
    protected $guarded = [];

    protected $touches = ['translaterequest'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function translaterequest()
    {
        return $this->belongsTo(TranslateRequest::class);
    }
}
