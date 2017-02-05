<?php

namespace Tests\Unit\Http\Api\v1;

use App\Link;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LinkTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'links';

    /** @var string $table Ruta de la api. */
    protected $api = 'api/v1';

    /**
     * Obtener todos los links.
     *
     * @return void
     */
    public function testLinkAll()
    {
        $links = factory(Link::class, 10)->create();

        $response = $this->json('GET', $this->api . '/links');

        $response->assertStatus(200);

        $links = $response->decodeResponseJson($links);
        
        $response->assertExactJson($links);
    }

    /**
     * Crear un nuevo link.
     *
     * @return void
     */
    public function testLinkStore()
    {
        $link = array(
            'url' => 'http://felix.barros',
            'active' => true,
        );

        $response = $this->json('POST', $this->api . '/link', $link);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    /**
     * Obtener un link.
     *
     * @return void
     */
    public function testLinkFind()
    {
        $link = factory(Link::class)->create();

        $response = $this->json('GET', $this->api . '/link/' . $link->id);

        $response->assertStatus(200);

        $link = $response->decodeResponseJson($link);
        
        $response->assertExactJson($link);
    }

    /**
     * Actualizar los datos de un link.
     *
     * @return void
     */
    public function testLinkUpdate()
    {
        $link = factory(Link::class)->create();

        $update = array(
            'url' => 'http://felix.barros',
            'active' => false,
        );

        $response = $this->json('PUT', $this->api . '/link/' . $link->id, $update);

        $response
            ->assertStatus(200)
            ->assertJson([
                'updated' => true,
            ]);
    }

    /**
     * Eliminar un link.
     *
     * @return void
     */
    public function testLinkDestroy()
    {
        $link = factory(Link::class)->create();

        $response = $this->json('DELETE', $this->api . '/link/' . $link->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'deleted' => true,
            ]);
        
        $this->assertDatabaseMissing($this->table, $link->toArray());
    }
}
