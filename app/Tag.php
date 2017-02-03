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
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener los posts de un tag.
     */
    public function posts()
    {
        return $this->morphedByMany('App\Post', 'taggable');
    }
}
