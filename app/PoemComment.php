<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoemComment extends Model
{
    protected $fillable = ['body', 'poem_id', 'user_id'];

    protected $touches = ['poem'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function poem()
    {
        return $this->belongsTo(Poem::class);
    }
}
