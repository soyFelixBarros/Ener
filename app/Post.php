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
        'newspaper_id',
        'title',
        'summary',
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
     * Obtener el link del post.
     */
    public function link()
    {
        return $this->hasOne('App\Link');
    }

    /**
     * Obtener la fuente del post.
     */
    public function newspaper()
    {
        return $this->belongsTo('App\Newspaper')
                    ->select(['id', 'name']);
    }
}
