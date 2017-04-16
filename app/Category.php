<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener todas las entradas de un diario.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Obtener los links de una categoria.
     */
    public function links()
    {
        return $this->hasMany('App\Link');
    }

    /**
     * Capturar el slug.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
