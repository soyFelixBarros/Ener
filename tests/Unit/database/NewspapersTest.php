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
    	$id = factory(Newspaper::class)->create()->id;

    	$newspaper = Newspaper::find($id);
    	$newspaper->name = 'New title';
        $newspaper->website = 'http://new-title';
        $newspaper->slug = str_slug('New title');
    	$newspaper->save();

    	$this->assertDatabaseHas($this->table, [
            'name' => $newspaper->name,
            'webiste' => $newspaper->website,
            'slug' => $newspaper->website,
        ]);

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