<?php

use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = (new App\Filter())->getTable();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filters = [
            // Diario Chaco
    		[
                1,
                '//h3/a',
                '//article/h2/a[2]',
                '//html/head/meta[@property="og:image"]/@content',
                '//div[@class="cuerpo"]//div[@class="field-items"]/div/*',
            ],
            
            // Diario NORTE
            [
                2,
                '//article/a',
                '//main/div/div[@class="container"]/h1',
                '//figure/img/@src',
                '//article//section[@class="body"]//p',
            ],
            
            // DataChaco.com
            [
                3,
                '//div[@class="col-not-titulo"]/a',
                '//*[@id="contenido-view"]/div/div[@class="view-titulo"]',
                '//div[@class="carousel-inner"]/div/img/@data-original',
                '//div[@class="view-cuerpo"]/*',
            ],

            // Chaco Dia Por Dia
            [
                4,
                '//*[@class="td_block_inner"]/div[1]/div[1]/div[2]/div/div[1]/h3/a',
                '//header/h1',
                '//html/head/meta[@property="og:image"]/@content',
                '//div[@class="td-post-content"]/p',
            ],

            // Diario TAG
            [
                5,
                '//article/h1/a',
                '//h1',
                '//div[@class="node-content"]/a[@class="image-link"]/@href',
                '//div[@class="field-items"]//*',
            ],

            // diario21.tv
            [
                6,
                '//div[@class="rela-titu"]/a',
                '//html/head/meta[@property="og:title"]/@content',
                '//html/head/meta[@property="og:image"]/@content',
                '//div[@class="titulo-des"]/p',
            ],

            // Primera Línea
            [
                7,
                '//div[@class="td-ss-main-content"]//h3/a',
                '//header[@class="td-post-title"]/h1[@class="entry-title"]',
                '//div[@class="td-post-featured-image"]//@href',
                '//div[@class="td-post-content"]/p',
            ],

            // La Voz del Chaco
            [
                8,
                '//article[1]//h3/a',
                '//h2',
                '//div[@class="portfolio-overlay"]/a/@href',
                '//blockquote/p',
            ],

            // Chaco On Line
            [
                9,
                '//article//h3/a',
                '//article/header/h1',
                '//article/div[5]/img/@src',
                '//div[@class="detalle"]',
            ],

            // Chaco Hoy
            [
                10,
                '//div/h1/a',
                '//h1',
                '//img[@class="sombra"]/@src',
                '//div[@class="fuentes"]',
            ],
    	];

    	foreach ($filters as $filter) {
    		DB::table($this->table)->insert([
                'source_id' => $filter[0],
                'link' => $filter[1],
                'title' => $filter[2],
    			'image' => $filter[3],
    			'text' => $filter[4],
    		]);
    	}
    }
}