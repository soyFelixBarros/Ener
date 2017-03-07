<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articles';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'newspaper_id',
        'title',
        'summary',
        'created_at',
        'updated_at',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'newspaper_id'
    ];

    /**
     * Obtener el link de un artículo.
     */
    public function link()
    {
        return $this->hasOne('App\Link');
    }

    /**
     * Obtener la fuente del artículo.
     */
    public function newspaper()
    {
        return $this->belongsTo('App\Newspaper')
                    ->select(['id', 'name']);
    }

    /**
     * Obtener todos los tags de un post.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
