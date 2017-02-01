<?php

namespace Tests\Unit\database;

use App\Province;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProvinceTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'provinces';

    /** @var array $columns Nombres de los campos de una tabla. */
    protected $columns = [
        'id',
        'country_id',
        'name',
    ];

    /**
     * Verificar si existe la tabla.
     *
     * @return void
     */
    public function testHasProvinceTable()
    {
        $this->assertTrue(Schema::hasTable($this->table));
    }
    
    /**
     * Verificar si existen las columnas en un tabla.
     *
     * @return void
     */
    public function testHasColumnsInProvinceTable()
    {
        for ($i = 0; count($this->columns) > $i; $i++) {
            $this->assertTrue(Schema::hasColumn($this->table, $this->columns[$i]));
        }
    }

    /**
     * Agregar una provincia.
     *
     * @return void
     */
    public function testCreateProvince()
    {
    	$province = factory(Province::class)->create();
    	
    	$this->assertDatabaseHas($this->table, $province->toArray());
    }

    /**
     * Actualizar datos de una provincia.
     *
     * @return void
     */
    public function testUpdateProvince()
    {
    	$province = factory(Province::class)->create();

    	$province = Province::find($province->id);
    	$province->name = 'Chaco';
    	$province->save();

    	$this->assertDatabaseHas($this->table, ['name' => 'Chaco']);

    }

    /**
     * Eliminar una provincia.
     *
     * @return void
     */
    public function testDeleteProvince()
    {
    	$province = factory(Province::class)->create();

    	Province::destroy($province->id);

    	$this->assertDatabaseMissing($this->table, $province->toArray());
    }
}