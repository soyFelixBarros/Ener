<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parent extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'parents';

	/**
     * Obtener todos las entradas publicadas.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
