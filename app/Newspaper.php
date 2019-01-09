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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'website',
        'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener los xpath del diario.
     */
    public function scraper()
    {
        return $this->hasOne('App\Scraper');
    }

    /**
     * Obtener todos los links de un diario.
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
