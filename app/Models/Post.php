<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['title', 'text', 'short_text', 'image', 'slug'];

    public function category() { // One to One
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function comments() { // One to Many
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function tags() { // Many to Many
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
}
