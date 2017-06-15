<?php

namespace Tests\Unit\database;

use App\Post;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostsTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'posts';

    /** @var array $columns Nombres de los campos de una tabla. */
    protected $columns = [
        'id',
        'parent_id',
        'province_code',
        'newspaper_id',
        'category_id',
        'title',
        'summary',
        'image',
        'url',
        'status',
        'created_at',
        'updated_at'
    ];

    /**
     * Verificar si existe la tabla.
     *
     * @return void
     */
    public function testHasTable()
    {
        $this->assertTrue(Schema::hasTable($this->table));
    }
    
    /**
     * Verificar si existen las columnas en un tabla.
     *
     * @return void
     */
    public function testHasColumnsInTable()
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
    	$id = factory(Post::class)->create()->id;

    	$post = Post::find($id);
    	$post->title = 'New title';
        $post->url = 'http://cablera.online/new-title';
    	$post->save();

    	$this->assertDatabaseHas($this->table, [
            'title' => $post->title,
            'url' => $post->url
        ]);
    }

    /**
     * Eliminar un post.
     *
     * @return void
     */
    public function testDeletePost()
    {
    	$post = factory(Post::class)->make();
        
    	Post::destroy($post->id);

    	$this->assertDatabaseMissing($this->table, $post->toArray());
    }
}
