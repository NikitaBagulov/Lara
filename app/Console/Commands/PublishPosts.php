<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Post;
use Illuminate\Support\Carbon;

class PublishPosts extends Command
{
    protected $signature = 'posts:publish';
    protected $description = 'Автоматическая публикация постов';

    public function handle()
    {
        $postsToPublish = Post::where('is_published', false)
            ->get();

        foreach ($postsToPublish as $post) {
            $post->update(['is_published' => true]);
            $post->update(['publish_at'=> now()]);
            $this->info("Пост с  ID:{$post->id} опубликован");
        }

        $this->info('Автоматическая публикация завершена');
    }
}
