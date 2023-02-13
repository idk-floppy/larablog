<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'teaser', 'content', 'image'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function scopeNewestFirst(Builder $query)
    {
        return $query->orderBy('created_at', 'DESC');
    }

    public function scopeSearchMain(Builder $query, $q)
    {
        return $query->where('title', 'like', '%' . $q . '%')->orWhere('teaser', 'like', '%' . $q . '%')->orWhere('content', 'like', '%' . $q . '%');
    }

    public function refreshTags(array $tags)
    {
        try {
            $this->tags()->sync([]); // remove every connection
            foreach (array_unique($tags) as $fetchedTags) {
                $preferredTags = Tag::firstOrCreate(['text' => $fetchedTags]); // $fetchedTags -> fetchedTags, $preferredTags -> preferredTags
                $this->tags()->attach($preferredTags); // attach the preferred tags
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
