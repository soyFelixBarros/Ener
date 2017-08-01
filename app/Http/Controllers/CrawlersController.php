<?php

namespace App\Http\Controllers;

use App\Link;
use App\Post;
use App\Newspaper;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;
use Intervention\Image\ImageManagerStatic as Image;

class CrawlersController extends Controller
{
    public function __construct()
    {
        ini_set('default_socket_timeout', 10);
    }

    private function get_http_response_code($url) {
        $headers = @get_headers(urldecode($url));

        return (int) substr($headers[0], 9, 3);
    }
    
    private function toScrape($settings)
    {
        $settings = (array) $settings;

        if (count($settings) > 0) {
            // Decodifica una cadena cifrada como URL
            $url = urldecode($settings[0]);

            // Transmite un fichero entero a una cadena
            $html = @file_get_contents($url);

            // Obtener el status HTTP
            // $status = (int) substr($http_response_header[0], 9, 3);

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
        $post = Post::withoutGlobalScopes()
                    ->where('newspaper_id', $newspaper_id, 'and')
                    ->where('title', 'LIKE', '%'.$title.'%', 'and')
                    ->whereDate('created_at', date('Y-m-d'))
                    ->first();
        return $post;
    }
    
    public function title()
    {
        // $table = (new Link())->getTable();
        // Obtener un link
        $link = Link::where('active', true, 'AND')
                    ->where('scraping', false)
                    ->oldest('updated_at')
                    ->first();

        // Obtener el status de la URL
        $status = $this->get_http_response_code($link->url);

        // Actualziamos el campo Scraping
        $link->update(array('scraping' => true));

        if ($status == 200) {
            // Obterner el contenido
            $content = $this->toScrape([
                $link->url,
                $link->newspaper->scraper->title,
            ]);
            
            if ($content) {    
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
                        'country_id' => $link->newspaper->country->id,
                        'province_id' => $link->newspaper->province->id,
                        'newspaper_id' => $link->newspaper->id,
                        'category_id' => $link->category_id,
                        'title' => $title,
                        'url' => $url,
                        'status' => 'summary',
                    ]);
                }
            }
        } else {
            $link->active = false;
            $link->status = $status;
        }
        
        $link->scraping = false;
        $link->save();

        return $link;
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
                $post->newspaper->scraper->content,
            ]);

            if ($content->count() > 0) { 
                $summary = trim(html_entity_decode($content->text()));
                $summary = str_replace("\xc2\xa0", '', $summary);

                $post->update([
                    'summary' => ($summary != '') ? $summary : null,
                ]);
            }

            $post->update(['status' => 'image']);

            return $post->summary;
        }
    }

    public function image()
    {

        $post = Post::where('status', 'image')
                    ->oldest('updated_at')
                    ->first();

        if (count($post) > 0) {
            
            $post->update(['status' => 'pending']);

            // Obterner el contenido
            $content = $this->toScrape([
                $post->url,
                $post->newspaper->scraper->src,
            ]);

            if (count($content) > 0) {
                $src = $this->prepareLink($content->text(), $post->newspaper->website);
                $file = $post->id.'-'.str_slug($post->title).'.jpg';
                $path = public_path('/uploads/images/');

                $image = Image::make($src)->save($path.$file);
                              // ->fit(520, 480, null, 'top')
                              // ->fit(170, 150, null, 'top')
                              // ->sharpen(10)
                              // ->save($path.$file);
                              

                $post->update([
                    'image' => $file,
                ]);
            }
            $post->update(['status' => 'publish']);
            return $post->image;
        }
    }
}
