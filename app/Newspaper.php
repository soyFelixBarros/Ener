<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newspaper extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'newspapers';

    /**
     * Obtener todos los posts de un diario.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
