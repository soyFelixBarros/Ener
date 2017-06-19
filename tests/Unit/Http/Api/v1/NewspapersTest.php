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
    protected $api = 'api/v1/newspapers/';

    /**
     * Obtener todos los posts.
     *
     * @return void
     */
    public function testNewspaperAll()
    {
        $newspapers = factory(Newspaper::class, 10)->create();

        $response = $this->json('GET', $this->api);

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
        // Creamos una nueva provincia
        $province = factory('App\Province')->create();

        // Datos del nuevo newspaper
        $newspaper = array(
            'province_id' => $province->id, // Codigo de la provincia
            'name' => 'Felix News',
            'website' => 'felix.news',
        );

        // Enviamos los datos
        $response = $this->json('POST', $this->api, $newspaper);

        // Verificamos si existe en la base de datos
        $this->assertDatabaseHas($this->table, $newspaper);

        // Estado de la espuesta
        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    /**
     * Actualizar los datos de un newspaper.
     *
     * @return void
     */
    public function testNewspaperUpdate()
    {
        // Crear un diario nuevo
        $newspaper = factory(Newspaper::class)->create();

        // Creamos una nueva provincia
        $province = factory('App\Province')->create();

        // Array para actulizar los datos del newspaper
        $data = array(
            'province_code' => $province->code,
            'name' => 'Felix News',
            'website' => 'felix.news'
        );

        // Actualizar el newspaper con los datos nuevos
        $response = $this->json('PUT', $this->api . $newspaper->id, $data);

        // Estatus de la respuesta y verificación de la respuesta
        // $response
        //     ->assertStatus(200)
        //     ->assertJson([
        //         'updated' => true,
        //     ]);
    }

    /**
     * Eliminar un newspaper.
     *
     * @return void
     */
    public function testNewspaperDestroy()
    {
        $newspaper = factory(Newspaper::class)->make();

        $response = $this->json('DELETE', $this->api . $newspaper->id);

        // $response
        //     ->assertStatus(200)
        //     ->assertJson([
        //         'deleted' => true,
        //     ]);
    }
}
