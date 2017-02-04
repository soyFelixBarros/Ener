<?php

namespace Tests\Unit\database;

use App\Taggable;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaggableTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'taggables';

    /** @var array $columns Nombres de los campos de una tabla. */
    protected $columns = [
        'id',
        'tag_id',
        'taggable_id',
        'taggable_type',
        'created_at',
        'updated_at',
    ];

    /**
     * Verificar si existe la tabla.
     *
     * @return void
     */
    public function testHasTaggablesTable()
    {
        $this->assertTrue(Schema::hasTable($this->table));
    }
    
    /**
     * Verificar si existen las columnas en un tabla.
     *
     * @return void
     */
    public function testHasColumnsInTaggablesTable()
    {
        for ($i = 0; count($this->columns) > $i; $i++) {
            $this->assertTrue(Schema::hasColumn($this->table, $this->columns[$i]));
        }
    }

    /**
     * Agregar un taggable.
     *
     * @return void
     */
    public function testCreateTaggable()
    {
    	$taggable = factory(Taggable::class)->create();
    	
    	$this->assertDatabaseHas($this->table, $taggable->toArray());
    }

    /**
     * Actualizar datos de una taggable.
     *
     * @return void
     */
    public function testUpdateTaggable()
    {
        $taggable = factory(Taggable::class)->create();
    	$tag = factory('App\Tag')->create();
        $post = factory('App\Post')->create();

    	$taggable = Taggable::find($taggable->id);
    	$taggable->tag_id = $tag->id;
        $taggable->taggable_id = $post->id;
        $taggable->taggable_type = 'App\Post';
    	$taggable->save();
        
    	$this->assertDatabaseHas($this->table, [
            'tag_id' => $taggable->tag_id,
            'taggable_id' => $taggable->taggable_id,
            'taggable_type' => $taggable->taggable_type,
        ]);
    }

    /**
     * Eliminar una taggable.
     *
     * @return void
     */
    public function testDeleteTaggable()
    {
    	$taggable = factory(Taggable::class)->create();

    	Taggable::destroy($taggable->id);

    	$this->assertDatabaseMissing($this->table, $taggable->toArray());
    }
}