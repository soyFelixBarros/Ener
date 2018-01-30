<?php

namespace App\Http\Controllers\Scraper;

use App\Link;
use Felix\Scraper\Http;
use Felix\Scraper\Crawler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    public function __construct()
    {
        $crawler = new Crawler();
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

        $content = $this->crawler->start($link->url, '//');

        if ($content->count()) {
            dd($content);
            //return 'Enviar link para ser procesado.';
            // event(new \App\Events\PostScraped($post));
        } else {
            $link->active = false;
        }

        $link->status = $status;
        $link->updated_at = date('Y-m-d H:i:s');

        $link->save();
	}
}