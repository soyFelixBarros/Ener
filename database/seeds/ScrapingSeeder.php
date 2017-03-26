<?php

use Illuminate\Database\Seeder;

class ScrapingSeeder extends Seeder
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
                '//div[2]/div[2]/h3/a',
                '//article//a//img/@src',
                '//*[@id="content"]/article/div[2]/div[4]/div/div/div/*[2]//text()',
            ],
            
            // Diario NORTE
            [
                '//div[1]/section/article[1]/h3/a',
                '//*[@id="body"]/section/article//img/@src',
                '//*[@id="body"]/section/article/p[1]/text()',
            ],
            
            // DataChaco.com
            [
                '//div[5]/div[2]/div[1]/div/div[2]/a',
                '//div[@class="carousel-inner"]/div/img/@data-original',
                '//*[@id="contenido-view"]/div/div[4]/text()',
            ],

            // Chaco Dia Por Dia
            [
                '//section/section/section/div/div[1]/div/article[1]/h2/a',
                '//div/figure//img/@src',
                '/html/body/section/div[1]/article/h2/text()',
            ],

            // Diario TAG
            [
                '//div[1]/article/h1/a',
                '//a[@class="image-link"]/@href',
                '//*/div[1]/div[4]/div[1]/div/div/p[1]/text()',
            ],

            // diario21.tv
            [
                '//div[@class="rela-titu"]/a',
                '//*[@id="slider"]/div/ul/li[1]/a/@href',
                '//div[3]/div/div[2]/div[3]/text()',
            ],

            // Primera Línea
            [
                '//div[1]/div[2]/h5/a',
                '//div[@id="w620"]/img/@src | //div[@class="w300"]/div/img/@src',
                '/html/body/div[4]/div/div/div/div/div[1]/div/div[1]/h3/text()',
            ],
    	];

    	for ($i = 0; count($scrapings) > $i; $i++) {
    		DB::table('scrapings')->insert([
                'title' => $scrapings[$i][0],
    			'src' => $scrapings[$i][1],
    			'content' => $scrapings[$i][2],
    		]);
    	}
    }
}