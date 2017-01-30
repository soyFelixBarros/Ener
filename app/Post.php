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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'newspaper_id'
    ];

    /**
     * Obtener la fuente del post.
     */
    public function newspaper()
    {
        return $this->belongsTo('App\Newspaper')
                    ->select(['id', 'name']);
    }
}
