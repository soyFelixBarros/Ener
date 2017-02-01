<?php

namespace Tests\Unit\Http\Api\v1;

use App\Newspaper;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewspaperTest extends TestCase
{
    use DatabaseTransactions;

    /** @var string $table Nombre de la tabla. */
    protected $table = 'newspapers';

    /** @var string $table Ruta de la api. */
    protected $api = 'api/v1';

    /**
     * Obtener todos los posts.
     *
     * @return void
     */
    public function testNewspaperAll()
    {
        $newspapers = factory(Newspaper::class, 10)->create();

        $response = $this->json('GET', $this->api . '/newspaper');

        $response->assertStatus(200);

        $newspapers = $response->decodeResponseJson($newspapers);
        
        $response->assertExactJson($newspapers);
    }
}
