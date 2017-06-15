<?php

namespace Tests\Unit\database;

use App\Link;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LinksTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'links';

    /** @var array $columns Nombres de los campos de una tabla. */
    protected $columns = [
        'id',
        'newspaper_id',
        'category_id',
        'url',
        'status',
        'created_at',
        'updated_at',
    ];

    /**
     * Verificar si existe la tabla.
     *
     * @return void
     */
    public function testHasLinksTable()
    {
        $this->assertTrue(Schema::hasTable($this->table));
    }
    
    /**
     * Verificar si existen las columnas en un tabla.
     *
     * @return void
     */
    public function testHasColumnsInLinksTable()
    {
        for ($i = 0; count($this->columns) > $i; $i++) {
            $this->assertTrue(Schema::hasColumn($this->table, $this->columns[$i]));
        }
    }

    /**
     * Crear un link.
     *
     * @return void
     */
    public function testCreateLink()
    {
    	$link = factory(Link::class)->create();
    	
    	$this->assertDatabaseHas($this->table, $link->toArray());
    }

    /**
     * Actualizar datos de un link.
     *
     * @return void
     */
    public function testUpdateLink()
    {
    	$link = factory(Link::class)->create();

    	$link = Link::find($link->id);
    	$link->url = 'http://felix.barros';
    	$link->save();

    	$this->assertDatabaseHas($this->table, [
            'url' => $link->url,
        ]);

    }

    /**
     * Eliminar un link.
     *
     * @return void
     */
    public function testDeleteLink()
    {
    	$link = factory(Link::class)->create();

    	Link::destroy($link->id);

    	$this->assertDatabaseMissing($this->table, $link->toArray());
    }
}