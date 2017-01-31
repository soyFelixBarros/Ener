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
    public function testPostAll()
    {
        $posts = factory(Post::class, 10)->create();

        $response = $this->json('GET', $this->api . '/post');

        $response->assertStatus(200);

        $posts = $response->decodeResponseJson($posts);
        
        $response->assertExactJson($posts);
    }

    /**
     * Crear un nuevo post.
     *
     * @return void
     */
    public function testPostStore()
    {
        $post = array(
            'title' => '¿Qué es Lorem Ipsum?',
            'summary' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.',
        );

        $response = $this->json('POST', $this->api . '/post', $post);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    /**
     * Obtener un post segun el ID.
     *
     * @return void
     */
    public function testPostFind()
    {
        $post = factory(Post::class)->create();

        $response = $this->json('GET', $this->api . '/post/' . $post->id);

        $response->assertStatus(200);
        
        $post = $response->decodeResponseJson($post);
        
        $response->assertExactJson($post);
    }


    /**
     * Eliminar un post segun el ID.
     *
     * @return void
     */
    public function testPostDestroy()
    {
        $post = factory(Post::class)->create();

        $response = $this->json('DELETE', $this->api . '/post/' . $post->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'deleted' => true,
            ]);
        
        $this->assertDatabaseMissing($this->table, $post->toArray());
    }
}
