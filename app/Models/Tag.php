<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Tag extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //relacion muchos a muchos con posts
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
