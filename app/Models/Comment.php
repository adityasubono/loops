<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['post_id','name','email','website','comment'];

    public function comments() {
        return $this->belongsTo('App\Models\Post', 'id');
    }
    use HasFactory;
}
