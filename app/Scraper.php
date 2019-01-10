<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scraper extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'scrapers';

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
        'newspaper_id',
        'status',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener el diario que posee del scraping.
     */
    public function newspaper()
    {
        return $this->belongsTo('App\Newspaper');
    }
}
