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
     * Obtener todos los posts de un diario.
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
        return $this->belongsTo('App\Province', 'province_code', 'code')
                    ->select(['code', 'name']);
    }
}
