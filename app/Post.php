<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_code',
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
        'newspaper_id',
    ];

    /**
     * Obtener la provincia del artículo.
     */
    public function province()
    {
        return $this->belongsTo('App\Province', 'province_code', 'code');
    }

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
                    ->with('province');
    }

    /**
     * Obtener todos los tags de un post.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
