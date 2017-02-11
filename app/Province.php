<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'provinces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'country_code',
        'code',
        'name',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener todos los posts de una provincia.
     */
    public function posts()
    {
        return $this->hasManyThrough('App\Post', 'App\Newspaper');
    }

    /**
     * Obtener el país de la provincia.
     */
    public function country()
    {
        return $this->belongsTo('App\Country', 'code', 'country_code');
    }

    /**
     * Obtener todos los diarios de una provincia.
     */
    public function newspapers()
    {
        return $this->hasMany('App\Newspaper', 'province_code', 'code');
    }
}
