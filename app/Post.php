<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['published_at'];

    //  fillable / musk assign property
    protected $fillable = [
      'title',
      'description',
      'content',
      'image',
      'category_id',
      'user_id',
      'published_at'
    ];

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function tags()
    {
      return $this->belongsToMany(Tag::class);
    }
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function hasTag($tagId)
    {
      return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function scopePublished($query)
    {
      return $query->where('published_at', "<=", now());
    }

    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if (!$search) {
          return $query->published();
        }
        return $query->published()->where('title', 'LIKE', "%{$search}%");
    }


}
