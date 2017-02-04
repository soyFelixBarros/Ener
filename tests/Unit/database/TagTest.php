<?php

namespace Tests\Unit\database;

use App\Tag;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TagTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'tags';

    /** @var array $columns Nombres de los campos de una tabla. */
    protected $columns = [
        'id',
        'name',
        'slug',
        'created_at',
        'updated_at',
    ];

    /**
     * Verificar si existe la tabla.
     *
     * @return void
     */
    public function testHasTagsTable()
    {
        $this->assertTrue(Schema::hasTable($this->table));
    }
    
    /**
     * Verificar si existen las columnas en un tabla.
     *
     * @return void
     */
    public function testHasColumnsInTagsTable()
    {
        for ($i = 0; count($this->columns) > $i; $i++) {
            $this->assertTrue(Schema::hasColumn($this->table, $this->columns[$i]));
        }
    }

    /**
     * Agregar un tag.
     *
     * @return void
     */
    public function testCreateTag()
    {
    	$tag = factory(Tag::class)->create();
    	
    	$this->assertDatabaseHas($this->table, $tag->toArray());
    }

    /**
     * Actualizar datos de una tag.
     *
     * @return void
     */
    public function testUpdateTag()
    {
    	$tag = factory(Tag::class)->create();

    	$tag = Tag::find($tag->id);
    	$tag->name = 'My tag';
        $tag->slug = str_slug('My tag', '-');
    	$tag->save();
        
    	$this->assertDatabaseHas($this->table, [
            'name' => $tag->name,
            'slug' => $tag->slug,
        ]);
    }

    /**
     * Eliminar una tag.
     *
     * @return void
     */
    public function testDeleteTag()
    {
    	$tag = factory(Tag::class)->create();

    	Tag::destroy($tag->id);

    	$this->assertDatabaseMissing($this->table, $tag->toArray());
    }
}