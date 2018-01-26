<?php

namespace App\Http\Controllers\Scraper;

use App\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    public function __construct()
    {
        // Tiempo de espera para la carga de los sitios web
        ini_set('default_socket_timeout', 30);
    }

    /**
     * Obtener el status HTTP de una url.
     * 
     * @return Integer
     */
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
	 * Obtner el link de un post
	 *
	 * @return Object
	 */
	public function index()
	{
        // Link activo con la fecha de actulización mas antigua.
        $link = Link::where('active', 1)->oldest('updated_at')->first();

        // Obtener el status de la URL
        $status = $this->get_http_response_code($link->url);

        if ($status == 200) {
            //return 'Enviar link para ser procesado.';
            // event(new \App\Events\PostScraped($post));
        } else {
            $link->active = false;
        }

        $link->status = $status;
        $link->updated_at = date('Y-m-d H:i:s');

        $link->save();

        dd($link);
	}
}