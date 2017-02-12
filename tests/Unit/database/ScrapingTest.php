<?php

namespace Tests\Unit\database;

use App\Scraping;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ScrapingTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'scrapings';

    /** @var array $columns Nombres de los campos de una tabla. */
    protected $columns = [
        'id',
        'title',
        'src',
        'content',
    ];

    /**
     * Verificar si existe la tabla.
     *
     * @return void
     */
    public function testHasScrapingsTable()
    {
        $this->assertTrue(Schema::hasTable($this->table));
    }
    
    /**
     * Verificar si existen las columnas en un tabla.
     *
     * @return void
     */
    public function testHasColumnsInScrapingsTable()
    {
        for ($i = 0; count($this->columns) > $i; $i++) {
            $this->assertTrue(Schema::hasColumn($this->table, $this->columns[$i]));
        }
    }

    /**
     * Agregar un scraping.
     *
     * @return void
     */
    public function testCreateScraping()
    {
    	$scraping = factory(Scraping::class)->create();
    	
    	$this->assertDatabaseHas($this->table, $scraping->toArray());
    }

    /**
     * Actualizar datos de un scraping.
     *
     * @return void
     */
    public function testUpdateScraping()
    {
    	$scraping = factory(Scraping::class)->create();

    	$scraping = Scraping::find($scraping->id);
    	$scraping->title = '/buscar/';
    	$scraping->save();

    	$this->assertDatabaseHas($this->table, [
            'title' => $scraping->title,
        ]);
    }

    /**
     * Eliminar un scraping
     *
     * @return void
     */
    public function testDeleteScraping()
    {
    	$scraping = factory(Scraping::class)->create();

    	Scraping::destroy($scraping->id);

    	$this->assertDatabaseMissing($this->table, $scraping->toArray());
    }
}