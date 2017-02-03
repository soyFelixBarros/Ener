<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'taggables';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag_id',
        'taggable_id',
        'taggable_type',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
