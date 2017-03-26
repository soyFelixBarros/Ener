<?php

namespace App\Http\Controllers;

use App\Link;
use App\Post;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class CrawlersController extends Controller
{
    private function toScrape($settings)
    {
        $settings = (array) $settings;
        $count = count($settings);

        if ($count > 0) {
            // Decodifica una cadena cifrada como URL
            $url = urldecode($settings[0]);

            // Transmite un fichero entero a una cadena
            $html = file_get_contents($url);
            
            if ($html !== false) {
                // Buscamos el contenido en el html
                $crawler = new Crawler($html);
                return $crawler->evaluate($settings[1]);
            }
        }
        return false;
    }

    private function hasScheme($path, $schemes = array('http'))
    {
        return in_array(strtolower(substr($path, 0, 4)), $schemes);
    }

    private function prepareLink($href, $uri)
    {
        if (! $this->hasScheme($href)) {
            $href = $uri.$href;
        }
        return $href;
    }

    /**
     * Mostrar una vista con información del crawler.
     *
     */
    public function index(Request $request)
    {
        // Obtener un link
        $link = Link::where('post_id', null)
                    ->oldest('updated_at')
                    ->with('newspaper')
                    ->with('scraping')
                    ->first();
                    
        // Obterner el contenido
        $content = $this->toScrape([
            $link->url,
            $link->scraping->title,
        ]);

        Link::where('id', $link->id)->update(['active' => true]);
        
        if ($content->count() > 0) {            
            // Crear o actualizar artículo en el casp de que exista.
            $post = Post::updateOrCreate([
                'province_code' => $link->newspaper->province->code,
                'newspaper_id' => $link->newspaper->id,
                'title' => $content->text(),
            ]);

            $link = new Link([
                'article_id' => $post->id,
                'newspaper_id' => $post->newspaper_id,
                'scraping_id' => $link->scraping->id,
                'url' => $this->prepareLink($content->attr('href'), $link->newspaper->website),
            ]);

            $post->link()->save($link);

            dd($content->text());
        } else {
            dd($content);
        }
        // return view('crawlers.index')->with('post', $post);
    }

    public function demo(Request $request)
    {
        $url = $request->input('url');
        $xpath = $request->input('xpath');
        
        $content = $this->toScrape([
            $url,
            $xpath,
        ]);
        
        dd($content);
    }
}
