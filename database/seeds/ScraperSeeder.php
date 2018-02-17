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
                '//article//a//img/@src',
                '//div[@class="field-item even"]/p[1] | //div[@class="field-item even"]/div[1]',
            ],
            
            // Diario NORTE
            [
                2,
                '//article/a',
                '//article/section/header/h1',
                '//figure/img/@src',
                '//article[1]/a/summary',
            ],
            
            // DataChaco.com
            [
                3,
                '//div[@class="col-not-titulo"]/a',
                '//*[@id="contenido-view"]/div/div[2]',
                '//div[@class="carousel-inner"]/div/img/@data-original',
                '//*[@id="contenido-view"]/div/div[4]/text()',
            ],

            // Chaco Dia Por Dia
            [
                4,
                '//*[@class="td_block_inner"]/div[1]/div[1]/div[2]/div/div[1]/h3/a',
                '//header/h1',
                '//div[@class="td-post-featured-image"]/figure/img/@src',
                '//p[@class="td-post-sub-title"]/text()',
            ],

            // Diario TAG
            [
                5,
                '//article/h1/a',
                '//h1',
                '//a[@class="image-link"]/@href',
                '//*/div[1]/div[4]/div[1]/div/div/p[1]/text()',
            ],

            // diario21.tv
            [
                6,
                '//div[@class="rela-titu"]/a',
                '//a[@class="tit-cata"]',
                '//div[@id="slider"]//img[1]/@src',
                '//div[@class="vol-des"]',
            ],

            // Primera Línea
            [
                7,
                '//h3/a',
                '//header/h1',
                '//div[@class="caja"]/div/div/*/img/@src',
                '//h3[@itemprop="description"]',
            ],
    	];

    	foreach ($scrapings as $scraper) {
    		DB::table($this->table)->insert([
                'newspaper_id' => $scraper[0],
                'href' => $scraper[1],
                'title' => $scraper[2],
    			'src' => $scraper[3],
    			'content' => $scraper[4],
    		]);
    	}
    }
}