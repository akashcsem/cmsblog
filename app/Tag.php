<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = ['name'];


  // one to many relationship with post table
  public function posts()
  {
    return $this->belongsToMany(Post::class);
  }
}
