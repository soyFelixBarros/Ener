<?php

namespace Tests\Unit\database;

use App\Country;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountriesTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'countries';

    /** @var array $columns Nombres de los campos de una tabla. */
    protected $columns = [
        'id',
        'code',
        'name',
    ];

    /**
     * Verificar si existe la tabla.
     *
     * @return void
     */
    public function testHasCountriesTable()
    {
        $this->assertTrue(Schema::hasTable($this->table));
    }
    
    /**
     * Verificar si existen las columnas en un tabla.
     *
     * @return void
     */
    public function testHasColumnsInCountriesTable()
    {
        for ($i = 0; count($this->columns) > $i; $i++) {
            $this->assertTrue(Schema::hasColumn($this->table, $this->columns[$i]));
        }
    }

    /**
     * Agregar un país.
     *
     * @return void
     */
    public function testCreateCountry()
    {
    	$country = factory(Country::class)->create();
    	
    	$this->assertDatabaseHas($this->table, $country->toArray());
    }

    /**
     * Actualizar datos de un país.
     *
     * @return void
     */
    public function testUpdateCountry()
    {
    	$country = factory(Country::class)->create();

    	$country = Country::find($country->id);
    	$country->name = 'Argentina';
    	$country->save();

    	$this->assertDatabaseHas($this->table, [
            'name' => $country->name,
        ]);

    }

    /**
     * Eliminar un país.
     *
     * @return void
     */
    public function testDeleteCountry()
    {
    	$country = factory(Country::class)->create();

    	Country::destroy($country->id);

    	$this->assertDatabaseMissing($this->table, $country->toArray());
    }
}