<?php

namespace Tests\Unit\Http\Api\v1;

use App\Country;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'countries';

    /** @var string $table Ruta de la api. */
    protected $api = 'api/v1';

    /**
     * Obtener todos los países.
     *
     * @return void
     */
    public function testCountryAll()
    {
        $country = factory(Country::class, 10)->create();

        $response = $this->json('GET', $this->api . '/countries');

        $response->assertStatus(200);

        $country = $response->decodeResponseJson($country);
        
        $response->assertExactJson($country);
    }

    /**
     * Crear un nuevo país.
     *
     * @return void
     */
    public function testCountryStore()
    {
        $country = array(
            'code' => 'AR',
            'name' => 'Argentina',
        );

        $response = $this->json('POST', $this->api . '/country', $country);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    /**
     * Obtener los datos de un país.
     *
     * @return void
     */
    public function testCuontryFind()
    {
        $country = factory(Country::class)->create();

        $response = $this->json('GET', $this->api . '/country/' . $country->id);

        $response->assertStatus(200);

        $country = $response->decodeResponseJson($country);
        
        $response->assertExactJson($country);
    }

    /**
     * Actualizar los datos de un país.
     *
     * @return void
     */
    public function testCountryUpdate()
    {
        $country = factory(Country::class)->create();

        $update = array('name' => 'Argentina');

        $response = $this->json('PUT', $this->api . '/country/' . $country->id, $update);

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
    public function testCountryDestroy()
    {
        $country = factory(Country::class)->create();

        $response = $this->json('DELETE', $this->api . '/country/' . $country->id);

        $response
            ->assertStatus(200)
            ->assertJson([
                'deleted' => true,
            ]);
        
        $this->assertDatabaseMissing($this->table, $country->toArray());
    }
}
