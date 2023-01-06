<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'teaser', 'content'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function scopeNewestFirst(Builder $query)
    {
        return $query->orderBy('created_at', 'DESC');
    }
}