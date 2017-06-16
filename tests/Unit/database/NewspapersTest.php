<?php

namespace Tests\Unit\database;

use App\Newspaper;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewspapersTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'newspapers';

    /** @var array $columns Nombres de los campos de una tabla. */
    protected $columns = [
        'id',
        'province_code',
        'name',
        'website',
        'slug',
    ];

    /**
     * Verificar si existe la tabla.
     *
     * @return void
     */
    public function testHasNewspapersTable()
    {
        $this->assertTrue(Schema::hasTable($this->table));
    }
    
    /**
     * Verificar si existen las columnas en un tabla.
     *
     * @return void
     */
    public function testHasColumnsInNewspapersTable()
    {
        for ($i = 0; count($this->columns) > $i; $i++) {
            $this->assertTrue(Schema::hasColumn($this->table, $this->columns[$i]));
        }
    }

    /**
     * Crear un newspaper.
     *
     * @return void
     */
    public function testCreateNewspaper()
    {
    	$newspaper = factory(Newspaper::class)->create();
    	
    	$this->assertDatabaseHas($this->table, $newspaper->toArray());
    }

    /**
     * Actualizar datos de un newspaper.
     *
     * @return void
     */
    public function testUpdateNewspaper()
    {
    	$newspaper = factory(Newspaper::class)->create();
        
        $data =  array(
            'name' => 'New title',
            'website' => 'http://new-title',
            'slug' => str_slug('New title')
        );

    	$newspaper = Newspaper::where('id', $newspaper->id)
                              ->update($data);
    }

    /**
     * Eliminar un newspaper.
     *
     * @return void
     */
    public function testDeleteNewpaper()
    {
    	$newspaper = factory(Newspaper::class)->make();

    	Newspaper::destroy($newspaper->id);

    	$this->assertDatabaseMissing($this->table, $newspaper->toArray());
    }
}