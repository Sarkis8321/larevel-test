<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    


    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
