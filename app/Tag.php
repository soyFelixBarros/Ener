<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tags';

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
     * Obtener todos los artículos de un tag.
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
