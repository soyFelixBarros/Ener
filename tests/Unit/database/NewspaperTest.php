<?php

namespace Tests\Unit\database;

use App\Newspaper;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewspaperTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'newspapers';

    /** @var array $columns Nombres de los campos de una tabla. */
    protected $columns = [
        'id',
        'name',
        'website'
    ];

    /**
     * Verificar si existe la tabla.
     *
     * @return void
     */
    public function testHasNewspaperTable()
    {
        $this->assertTrue(Schema::hasTable($this->table));
    }
    
    /**
     * Verificar si existen las columnas en un tabla.
     *
     * @return void
     */
    public function testHasColumnsInNewspaperTable()
    {
        for ($i = 0; count($this->columns) > $i; $i++) {
            $this->assertTrue(Schema::hasColumn($this->table, $this->columns[$i]));
        }
    }

    /**
     * Crear un post.
     *
     * @return void
     */
    public function testCreateNewspaper()
    {
    	$newspaper = factory(Newspaper::class)->create();
    	
    	$this->assertDatabaseHas($this->table, $newspaper->toArray());
    }

    /**
     * Actualizar datos de un post.
     *
     * @return void
     */
    public function testUpdateNewspaper()
    {
    	$newspaper = factory(Newspaper::class)->create();

    	$newspaper = Newspaper::find($newspaper->id);
    	$newspaper->name = 'New title';
    	$newspaper->save();

    	$this->assertDatabaseHas($this->table, ['name' => 'New title']);

    }

    /**
     * Eliminar un post.
     *
     * @return void
     */
    public function testDeleteNewpaper()
    {
    	$newspaper = factory(Newspaper::class)->create();

    	newspaper::destroy($newspaper->id);

    	$this->assertDatabaseMissing($this->table, $newspaper->toArray());
    }
}