<?php

namespace App\Http\Controllers;

use App\Link;
use App\Post;
use App\Newspaper;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class CrawlersController extends Controller
{
    public function index()
    {
        return redirect('/crawlers/title');
    }

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
     * Buscar por el título si existe en la base de datos. 
     * 
     * @param string $title Título del post.
     * @param int $day Día en número para reducir la busqueda.
     * 
     * @return object|boolean
     */
    private function hasPostNow($newspaper_id, $title)
    {
        $post = Post::where('newspaper_id', $newspaper_id, 'and')
                    ->where('title', 'LIKE', $title . '%', 'and')
                    ->whereDay('created_at', date('j'))
                    ->first();
        return $post;
    }
    
    public function title()
    {
        // Obtener un link
        $link = Link::oldest('updated_at')->first();
        
        $link->update(['status' => 'scraping']);

        // Obterner el contenido
        $content = $this->toScrape([
            $link->url,
            $link->newspaper->scraping->title,
        ]);

        $link->update(['status' => 'pending']);

        if ($content->count() > 0) {    
            // Filtros
            $title = trim($content->text());
            $url = $this->prepareLink($content->attr('href'), $link->newspaper->website);

            // Buscar si el post existe
            $post = $this->hasPostNow($link->newspaper->id, $title);

            if (count($post) > 0) {

                // Comparamos los títulos
                $levenshtein = levenshtein($title, $post->title);

                // Si el título se modifico, lo actualizamos
                if ($levenshtein > 0 && $levenshtein < 20) {
                    $post = Post::where('id', $post->id)->update([
                        'title' => $title,
                        'url' => $url,
                    ]);
                }
            } else {
                $post = Post::create([
                    'province_code' => $link->newspaper->province->code,
                    'newspaper_id' => $link->newspaper->id,
                    'title' => $title,
                    'url' => $url,
                    'status' => 'summary',
                ]);
            }
        }
    }

    public function summary()
    {
        $post = Post::where('status', 'summary')
                    ->oldest('updated_at')
                    ->first();

        if (count($post) > 0) {

            $post->update(['status' => 'pending']);
            
            // Obterner el contenido
            $content = $this->toScrape([
                $post->url,
                $post->newspaper->scraping->content,
            ]);

            if ($content->count() > 0) { 
                $summary = trim(html_entity_decode($content->text()));
                $summary = str_replace("\xc2\xa0", '', $summary);

                $post->update([
                    'summary' => ($summary !== '') ? $summary : null,
                ]);
            }

            $post->update(['status' => 'publish']);

            return $post->summary;
        }
    }
}
