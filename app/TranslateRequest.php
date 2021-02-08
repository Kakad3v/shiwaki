<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslateRequest extends Model
{
    protected $guarded = [];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function invite(User $user)
    {
        return $this->members()->attach($user);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'translate_request_members');
    }

    public function requestcomments()
    {
        return $this->hasMany(TranslateRequestComment::class);
    }

    public function path()
    {
        return route('show-work', $this->sub_url);
    }

    public function requestfiles()
    {
        return $this->hasMany(RequestFile::class);
    }
}
