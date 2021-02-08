<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function poemComments()
    {
        return $this->hasMany(PoemComment::class);
    }

    public function tags()
    {

        return $this->belongsToMany(Tag::class)->withTimestamps();
    }


    public function path()
    {
        return route('poems') . '/' . $this->slug;
    }

    public function status()
    {
        if ($this->status === 1) {
            return '<span class="bg-green-300 text-white py-1 px-2 rounded-full text-sm shadow-sm">Approved</span>';
        } else {
            return '<span class="bg-red-300 text-white py-1 px-2 rounded-full text-sm shadow-sm">Not approved</span>';
        }
    }

    public function poster()
    {
       return $this->image_path ? asset('storage'.'/'. $this->image_path) : asset('/images/poster.jpeg');
    }
}
