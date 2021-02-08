<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $guarded = [];

    public function articles()
    {
        return $this->BelongsToMany(Article::class);
    }

    public function stories()
    {
        return $this->BelongsToMany(Article::class);
    }

    public function reviews()
    {
        return $this->BelongsToMany(Article::class);
    }

    public function poems()
    {
        return $this->BelongsToMany(Article::class);
    }
}
