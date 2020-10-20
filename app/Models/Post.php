<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['user_id', 'title','slug','content'];


    public function posts() {
        return $this->hasMany('App\Models\Comment', 'post_id');
    }

    public function users() {
        return $this->belongsTo('App\Models\User', 'id');
    }

    public function scopeSlugLike($query, $slug)
    {
        return $query->where('slug', 'like', $slug . '%');
    }

    use HasFactory;
}
