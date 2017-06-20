<?php

namespace Tests\Feature;

use App\User;
use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    use DatabaseMigrations;
	/*public function setUp()
    {
        parent::setUp();
        \Illuminate\Support\Facades\Artisan::call('migrate');
    }*/

	/** @test */
    public function getPosts()
    {
        $user = factory(User::class)->create();
        $post1 = factory(Post::class)->create([
            'user_id' => $user->id,
            'post_type' => 'article'
        ]);
        $post2 = factory(Post::class)->create([
            'user_id' => $user->id,
            'post_type' => 'page'
        ]);

        $posts = Post::all();

        $this->assertEquals(2, $posts->count());
    }

    public function getPostPage()
    {
        $user = factory(User::class)->create();
        $post1 = factory(Post::class)->create([
            'user_id' => $user->id,
            'post_type' => 'article'
        ]);
        $post2 = factory(Post::class)->create([
            'user_id' => $user->id,
            'post_type' => 'page'
        ]);

        $posts = Post::getPostType('page');

        $this->assertEquals(1, $posts->count());
    }

    /** @test */
    public function get_post_type_page()
    {
        $user = factory(User::class)->create();
        $post1 = factory(Post::class)->create([
            'user_id' => $user->id,
            'post_type' => 'article'
        ]);
        $post2 = factory(Post::class)->create([
            'user_id' => $user->id,
            'post_type' => 'page'
        ]); 
        
        $response = $this->actingAs($user)->get('admin/posts', ['type' => 'page']);

        $response->assertStatus(200);
    }

    
}
