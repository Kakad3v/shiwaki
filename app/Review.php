<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return 'makala/' . $this->slug;
    }

    public function tags()
    {

        return $this->belongsToMany(Tag::class)->withTimestamps();
    }


    public function reviewcomments()
    {
        return $this->hasMany(ReviewComment::class);
    }

    public function status()
    {
        if ($this->status === 1) {
            return '<span class="bg-green-300 text-white py-1 px-2 rounded-full text-sm shadow-sm">Approved</span>';
        } else {
            return '<span class="bg-red-300 text-white py-1 px-2 rounded-full text-sm shadow-sm">Not approved</span>';
        }
    }
}
