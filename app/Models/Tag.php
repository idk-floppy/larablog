<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ['text'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    }
    public function scopeSearchMain(Builder $query, $q)
    {
        return $query->where('text', 'like', '%' . $q . '%');
    }
}
