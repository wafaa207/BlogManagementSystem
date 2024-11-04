<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title',
        'content',
        'status',
        'user_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function visits()
    {
        return $this->hasMany(PostVisit::class);
    }

    protected static function booted()
    {
        static::created(function ($post) {
            PostVisit::create([
                'post_id' => $post->id,
                'visitors' => 0,
            ]);
        });
    }

}
