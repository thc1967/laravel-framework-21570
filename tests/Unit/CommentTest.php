<?php

namespace Tests\Unit;

use App\Post;
use App\Comment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    /**
     * @test
     * @group
     */
    public function adding_a_comment_touches_the_post()
    {
        $this->signIn();

        $post = Post::create([
            'user_id' => $this->user->id,
            'subject' => 'test subject',
            'body' => 'test body',
        ]);
        $postUpdatedAt = $post->updated_at;

        $comment = Comment::create([
            'user_id' => $this->user->id,
            'post_id' => $post->id,
            'body' => 'comment body',
        ]);

        $post->fresh();

        $this->assertNotEquals($postUpdatedAt, $post->updated_at);
    }
}
