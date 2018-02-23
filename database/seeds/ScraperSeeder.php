<?php

use Illuminate\Database\Seeder;

class ScraperSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = (new App\Scraper())->getTable();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scrapings = [
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
                '//article/section/header/h1',
                '//figure/img/@src',
                '//article//section[@class="body"]/p',
            ],
            
            // DataChaco.com
            [
                3,
                '//div[@class="col-not-titulo"]/a',
                '//*[@id="contenido-view"]/div/div[2]',
                '//div[@class="carousel-inner"]/div/img/@data-original',
                '//div[@class="view-cuerpo"]/p',
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
                '//html/head/meta[@property="og:image:url"]/@content',
                '//div[@class="field-items"]//*',
            ],

            // diario21.tv
            [
                6,
                '//div[@class="rela-titu"]/a',
                '//a[@class="tit-cata"]',
                '//div[@id="slider"]//img[1]/@src',
                '//div[@class="titulo-des"]/p',
            ],

            // Primera Línea
            [
                7,
                '//div[@class="td-ss-main-content"]//h3/a',
                '//header[@class="td-post-title"]/h1[@class="entry-title"]',
                '//div[@class="caja"]/div/div/*/img/@src',
                '//div[@class="td-post-content"]/p',
            ],
    	];

    	foreach ($scrapings as $scraper) {
    		DB::table($this->table)->insert([
                'newspaper_id' => $scraper[0],
                'href' => $scraper[1],
                'title' => $scraper[2],
    			'image' => $scraper[3],
    			'content' => $scraper[4],
    		]);
    	}
    }
}