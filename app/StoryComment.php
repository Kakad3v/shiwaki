<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoryComment extends Model
{
    protected $fillable = ['body', 'story_id', 'user_id'];

    protected $touches = ['story'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
