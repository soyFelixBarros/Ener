<?php

namespace Tests\Unit\Http\Api\v1;

use App\Province;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProvincesTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'provinces';

    /** @var string $table Ruta de la api. */
    protected $api = 'api/v1/provinces/';

    /**
     * Obtener todas las provincias.
     *
     * @return void
     */
    public function testProvinceAll()
    {
        $province = factory(Province::class, 10)->create();

        $response = $this->json('GET', $this->api);

        $response->assertStatus(200);

        $province = $response->decodeResponseJson($province);
        
        $response->assertExactJson($province);
    }

    /**
     * Crear una nueva provincia.
     *
     * @return void
     */
    public function testProvinceStore()
    {
        $country = factory('App\Country')->create();
        
        $province = array(
            'country_id' => $country->id,
            'code' => 'AR-H',
            'name' => 'Chaco',
        );

        $response = $this->json('POST', $this->api, $province);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    /**
     * Obtener los datos de una provincia.
     *
     * @return void
     */
    public function testProvinceFind()
    {
        $province = factory(Province::class)->create();

        $response = $this->json('GET', $this->api. $province->id);

        $response->assertStatus(200);

        $province = $response->decodeResponseJson($province);
        
        $response->assertExactJson($province);
    }

    /**
     * Actualizar los datos de una provincia.
     *
     * @return void
     */
    public function testProvinceUpdate()
    {
        $province = factory(Province::class)->create();

        $update = array('name' => 'Chaco');

        $response = $this->json('PUT', $this->api . $province->id, $update);

        $response
            ->assertStatus(200)
            ->assertJson([
                'updated' => true,
            ]);
    }

    /**
     * Eliminar una provincia.
     *
     * @return void
     */
    public function testProvinceDestroy()
    {
        $province = factory(Province::class)->create();

        $response = $this->json('DELETE', $this->api . $province->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'deleted' => true,
            ]);
        
        $this->assertDatabaseMissing($this->table, $province->toArray());
    }
}