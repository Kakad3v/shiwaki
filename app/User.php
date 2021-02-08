<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar_path',  'bio', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function avatar()
    {
        return $this->avatar_path ?:  '../images/default.png';
    }

    public function articles()
    {
        return $this->hasMany(Article::class)
            ->latest();
    }

    public function stories()
    {
        return $this->hasMany(Story::class)
            ->latest();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)
            ->latest();
    }

    // Tanslations
    public function translaterequests()
    {
        return $this->hasMany(TranslateRequest::class)->latest('updated_at');
    }

    public function translatedworks()
    {
        return $this->hasMany(TranslatedWork::class);
    }

    public function accessibleRequests()
    {

        return TranslateRequest::where('user_id', $this->id)
            ->orWhereHas('members', function ($query) {
                $query->where('user_id', $this->id);
            })->latest(
                'updated_at'
            );
    }

    public function requestcomments()
    {
        return $this->hasMany(TranslateRequestComment::class)->latest('updated_at');
    }

    public function storycomments()
    {
        return $this->hasMany(StoryComment::class)->latest('updated_at');
    }

    public function poemcomments()
    {
        return $this->hasMany(PoemComment::class)->latest('updated_at');
    }

    public function requestfiles()
    {
        return $this->hasMany(RequestFile::class)->latest('updated_at');
    }

    // Poems
    public function poems()
    {
        return $this->hasMany(Poem::class);
    }

    // Poems
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    // Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function hasAnyRoles($roles)
    {
        if ($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        }

        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }

    // Reviews
    public function reviewcomments()
    {
        return $this->hasMany(ReviewComment::class);
    }

    public function isVerified()
    {
        return $this->hasAnyRoles(['admin', 'owner', 'author']);
    }
}
