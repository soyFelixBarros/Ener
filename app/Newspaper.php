<?php

namespace App;

use App\Scopes\LocationScope;
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
        'province_id',
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
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new LocationScope);
    }

    /**
     * Obtener los xpath del diario.
     */
    public function scraping()
    {
        return $this->hasOne('App\Scraping');
    }

    /**
     * Obtener todas las entradas de un diario.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Obtener todos los links de un diario.
     */
    public function links()
    {
        return $this->hasMany('App\Link');
    }

    /**
     * Obtener la provincia del diario.
     */
    public function province()
    {
        return $this->belongsTo('App\Province');
    }

    /**
     * Capturar el slug.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
