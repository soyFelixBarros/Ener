<?php

namespace Tests\Unit\database;

use App\Post;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'posts';

    /** @var array $columns Nombres de los campos de una tabla. */
    protected $columns = [
        'id',
        'newspaper_id',
        'title',
        'summary',
        'created_at',
        'updated_at'
    ];

    /**
     * Verificar si existe la tabla.
     *
     * @return void
     */
    public function testHasPostTable()
    {
        $this->assertTrue(Schema::hasTable($this->table));
    }
    
    /**
     * Verificar si existen las columnas en un tabla.
     *
     * @return void
     */
    public function testHasColumnsInPostTable()
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
    public function testCreatePost()
    {
    	$post = factory(Post::class)->create();
    	
    	$this->assertDatabaseHas($this->table, $post->toArray());
    }

    /**
     * Actualizar datos de un post.
     *
     * @return void
     */
    public function testUpdatePost()
    {
    	$post = factory(Post::class)->create();

    	$post = Post::find($post->id);
    	$post->title = 'New title';
    	$post->save();

    	$this->assertDatabaseHas($this->table, ['title' => 'New title']);

    }

    /**
     * Eliminar un post.
     *
     * @return void
     */
    public function testDeletePost()
    {
    	$post = factory(Post::class)->create();

    	Post::destroy($post->id);

    	$this->assertDatabaseMissing($this->table, $post->toArray());
    }
}
