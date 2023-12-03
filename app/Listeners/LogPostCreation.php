<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Support\Facades\Log;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogPostCreation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(PostCreated $event)
    {
        $post = $event->post;
        Log::info("Новый пост ". $post->title . " добавлен"); 

    }
}
