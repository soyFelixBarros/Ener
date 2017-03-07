<?php

namespace Tests\Unit\database;

use App\Article;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'articles';

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
     * Crear un article.
     *
     * @return void
     */
    public function testCreateArticle()
    {
    	$article = factory(Article::class)->create();
    	
    	$this->assertDatabaseHas($this->table, $article->toArray());
    }

    /**
     * Actualizar datos de un artículo.
     *
     * @return void
     */
    public function testUpdateArticle()
    {
    	$article = factory(Article::class)->create();

    	$article = Article::find($article->id);
    	$article->title = 'New title';
    	$article->save();

    	$this->assertDatabaseHas($this->table, [
            'title' => $article->title,
        ]);
    }

    /**
     * Eliminar un artículo.
     *
     * @return void
     */
    public function testDeleteArticle()
    {
    	$Article = factory(Article::class)->create();

    	Article::destroy($article->id);

    	$this->assertDatabaseMissing($this->table, $article->toArray());
    }
}
