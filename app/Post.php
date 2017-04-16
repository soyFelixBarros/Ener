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
        'parent_id',
        'province_code',
        'newspaper_id',
        'category_id',
        'title',
        'summary',
        'image',
        'url',
        'status',
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
     * Obtener la provincia del post.
     */
    public function province()
    {
        return $this->belongsTo('App\Province', 'province_code', 'code');
    }

    /**
     * Obtener el diario del post.
     */
    public function newspaper()
    {
        return $this->belongsTo('App\Newspaper')
                    ->with('province');
    }

    /**
     * Obtener la categoria del post.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Obtener todos los tags de un post.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function parent()
    {
        return $this->belongsTo('App\Post', 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Post', 'parent_id', 'id');
    }
}
