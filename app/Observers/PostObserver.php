<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function saving(Post $post)
    {
        $originalSlug = $slug = Str::slug($post->title);
        $posts = Post::slugLike($slug)->pluck('slug');

        $i=0;
        while($posts->contains($slug)){
            $slug = $originalSlug .'-'. ++$i;
        }

        $post->slug = $slug;
    }
}
