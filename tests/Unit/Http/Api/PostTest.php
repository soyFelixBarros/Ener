<?php

namespace Tests\Unit\Http\Api\v1;

use App\Post;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'posts';

    /** @var string $table Ruta de la api. */
    protected $api = 'api/v1';

    /**
     * Obtener todos los posts.
     *
     * @return void
     */
    public function testGetPostAll()
    {
        $posts = factory(Post::class, 10)->create();

        $response = $this->get($this->api . '/post');

        $response
            ->assertStatus(200)
            ->decodeResponseJson($posts);
    }

    /**
     * Obtener un post segun el ID.
     *
     * @return void
     */
    public function testGetPostFind()
    {
        $post = factory(Post::class)->create();

        $response = $this->get($this->api . '/post/' . $post->id);

        $response
            ->assertStatus(200)
            ->decodeResponseJson($post);
    }
}
