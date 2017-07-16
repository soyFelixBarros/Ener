<?php

use Illuminate\Database\Seeder;

class ScraperSeeder extends Seeder
{
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
                '//div[2]/div[2]/h3/a',
                '//article//a//img/@src',
                '//div[@class="field-item even"]/p[1] | //div[@class="field-item even"]/div[1]',
            ],
            
            // Diario NORTE
            [
                2,
                '//div[1]/section/article[1]/h3/a',
                '//*[@id="body"]/section/article//img/@src',
                '//summary/p',
            ],
            
            // DataChaco.com
            [
                3,
                '//div[5]/div[2]/div[1]/div/div[2]/a',
                '//div[@class="carousel-inner"]/div/img/@data-original',
                '//*[@id="contenido-view"]/div/div[4]/text()',
            ],

            // Chaco Dia Por Dia
            [
                4,
                '//section/section/section/div/div[1]/div/article[1]/h2/a',
                '//div/figure//img/@src',
                '/html/body/section/div[1]/article/h2/text()',
            ],

            // Diario TAG
            [
                5,
                '//div[1]/article/h1/a',
                '//a[@class="image-link"]/@href',
                '//*/div[1]/div[4]/div[1]/div/div/p[1]/text()',
            ],

            // diario21.tv
            [
                6,
                '//div[@class="rela-titu"]/a',
                '//div[@id="slider"]//img[1]/@src',
                '//div[@class="vol-des"]',
            ],

            // Primera Línea
            [
                7,
                '//div[1]/div[2]/h5/a',
                '//div[@class="caja"]/div/div/*/img/@src',
                '//h3[@itemprop="description"]',
            ],
    	];

    	for ($i = 0; count($scrapings) > $i; $i++) {
    		DB::table('scrapers')->insert([
                'newspaper_id' => $scrapings[$i][0],
                'title' => $scrapings[$i][1],
    			'src' => $scrapings[$i][2],
    			'content' => $scrapings[$i][3],
    		]);
    	}
    }
}