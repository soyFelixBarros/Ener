<?php

namespace Tests\Unit\Http\Api\v1;

use App\Newspaper;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewspaperTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'newspapers';

    /** @var string $table Ruta de la api. */
    protected $api = 'api/v1';

    /**
     * Obtener todos los posts.
     *
     * @return void
     */
    public function testNewspaperAll()
    {
        $newspapers = factory(Newspaper::class, 10)->create();

        $response = $this->json('GET', $this->api . '/newspapers');

        $response->assertStatus(200);

        $newspapers = $response->decodeResponseJson($newspapers);
        
        $response->assertExactJson($newspapers);
    }

    /**
     * Crear un nuevo newspaper.
     *
     * @return void
     */
    public function testNewspaperStore()
    {
        $province = factory('App\Province')->create();

        $newspaper = array(
            'province_code' => $province->code,
            'name' => 'Felix News',
            'website' => 'felix.news',
        );

        $response = $this->json('POST', $this->api . '/newspaper', $newspaper);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    /**
     * Obtener un newspaper.
     *
     * @return void
     */
    public function testNewspaperFind()
    {
        $newspaper = factory(Newspaper::class)->create();

        $response = $this->json('GET', $this->api . '/newspaper/' . $newspaper->id);

        $response->assertStatus(200);

        $newspaper = $response->decodeResponseJson($newspaper);
        
        $response->assertExactJson($newspaper);
    }

    /**
     * Actualizar los datos de un newspaper.
     *
     * @return void
     */
    public function testNewspaperUpdate()
    {
        $newspaper = factory(Newspaper::class)->create();

        $update = array(
            'name' => 'Felix News',
            'website' => 'felix.news',
        );

        $response = $this->json('PUT', $this->api . '/newspaper/' . $newspaper->id, $update);

        $response
            ->assertStatus(200)
            ->assertJson([
                'updated' => true,
            ]);
    }

    /**
     * Eliminar un newspaper.
     *
     * @return void
     */
    public function testNewspaperDestroy()
    {
        $newspaper = factory(Newspaper::class)->create();

        $response = $this->json('DELETE', $this->api . '/newspaper/' . $newspaper->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'deleted' => true,
            ]);
        
        $this->assertDatabaseMissing($this->table, $newspaper->toArray());
    }
}
