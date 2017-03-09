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
        'province_code',
        'name',
        'website',
        'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'province_code',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener todos los artículos de un diario.
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
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
        return $this->belongsTo('App\Province', 'province_code', 'code')
                    ->select(['code', 'name']);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
