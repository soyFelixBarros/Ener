<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images';

    public function __toString()
    {
        return $this->file;
    }
    
    /**
     * Obtener las noticias.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
