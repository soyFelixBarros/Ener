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
        'country_id',
        'code',
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'country_id',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener todos las entradas de una provincia.
     */
    public function posts()
    {
        return $this->hasManyThrough(
            'App\Post', 'App\Newspaper',
            'province_id', 'newspaper_id', 'id'
        );
    }

    /**
     * Obtener el país de la provincia.
     */
    public function country()
    {
        return $this->belongsTo('App\Country')
                    ->select(['code', 'name']);
    }

    /**
     * Obtener todos los diarios de una provincia.
     */
    public function newspapers()
    {
        return $this->hasMany('App\Newspaper');
    }
}
