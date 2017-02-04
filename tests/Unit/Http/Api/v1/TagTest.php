<?php

namespace Tests\Unit\Http\Api\v1;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TagTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'tags';

    /** @var string $table Ruta de la api. */
    protected $api = 'api/v1';

    /**
     * Obtener todos los tags.
     *
     * @return void
     */
    public function testTagAll()
    {
        $tags = factory('App\Tag', 10)->create();

        $response = $this->json('GET', $this->api . '/tag');

        $response->assertStatus(200);

        $tags = $response->decodeResponseJson($tags);
        
        $response->assertExactJson($tags);
    }

    /**
     * Crear un nuevo tag.
     *
     * @return void
     */
    public function testTagStore()
    {
        $tag = array(
            'name' => 'My tag',
        );

        $response = $this->json('POST', $this->api . '/tag', $tag);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    /**
     * Obtener un tag.
     *
     * @return void
     */
    public function testTagFind()
    {
        $tag = factory('App\Tag')->create();

        $response = $this->json('GET', $this->api . '/tag/' . $tag->id);

        $response->assertStatus(200);

        $tag = $response->decodeResponseJson($tag);
        
        $response->assertExactJson($tag);
    }

    /**
     * Actualizar los datos de un tag.
     *
     * @return void
     */
    public function testTagUpdate()
    {
        $tag = factory('App\Tag')->create();

        $update = array(
            'name' => 'My tag',
        );

        $response = $this->json('PUT', $this->api . '/tag/' . $tag->id, $update);

        $response
            ->assertStatus(200)
            ->assertJson([
                'updated' => true,
            ]);
    }

    /**
     * Eliminar un tag.
     *
     * @return void
     */
    public function testTagDestroy()
    {
        $tag = factory('App\Tag')->create();

        $response = $this->json('DELETE', $this->api . '/tag/' . $tag->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'deleted' => true,
            ]);
        
        $this->assertDatabaseMissing($this->table, $tag->toArray());
    }
}
