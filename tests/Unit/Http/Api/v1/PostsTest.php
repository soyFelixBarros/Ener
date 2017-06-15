<?php

namespace Tests\Unit\Http\Api\v1;

use App\Post;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostsTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'posts';

    /** @var string $table Ruta de la api. */
    protected $api = 'api/v1/posts/';

    /**
     * Obtener todos los posts.
     *
     * @return void
     */
    public function testPostAll()
    {
        $posts = factory(Post::class, 10)->create();

        $response = $this->json('GET', $this->api);

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

        $response = $this->json('POST', $this->api, $post);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    /**
     * Obtener un post.
     *
     * @return void
     */
    public function testPostFind()
    {
        $post = factory(Post::class)->create();

        $response = $this->json('GET', $this->api . $post->id);

        $response->assertStatus(200);
        
        $post = $response->decodeResponseJson($post);
        
        $response->assertExactJson($post);
    }

    /**
     * Actualizar los datos de un post.
     *
     * @return void
     */
    public function testPostUpdate()
    {
        // Crear un post nuevo
        $post = factory(Post::class)->make();

        // Verificar si existe el post en la base de datos
        $this->assertDatabaseHas($this->table, $post->toArray());

        // Array para actualziar los datos del post
        $update = array(
            'title' => '¿Qué es Lorem Ipsum?',
            'summary' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.',
        );

        // Actualizar el post creado con los datos nuevos
        $response = $this->json('PUT', $this->api . $post->id, $update);

        // Estatus de la respuesta y verificación de la respuesta
        $response
            ->assertStatus(200)
            ->assertJson([
                'updated' => true,
            ]);
    }

    /**
     * Eliminar un post.
     *
     * @return void
     */
    public function testPostDestroy()
    {
        $post = factory(Post::class)->make();

        $this->assertDatabaseHas($this->table, $post->toArray());

        $response = $this->json('DELETE', $this->api . $post->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'deleted' => true,
            ]);
        
        $this->assertSoftDeleted($this->table, $post->toArray());
    }
}
