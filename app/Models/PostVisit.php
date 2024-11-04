<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostVisit extends Model
{
    protected $fillable = [
        'visitor_ip',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
