<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scraping extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'scrapings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'src',
        'content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
