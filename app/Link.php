<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'links';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'newspaper_id',
        'scraping_id',
        'url',
        'active',
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
        'scraping_id',
    ];

    /**
     * Obtener la entrada que posée el link.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /**
     * Obtener el diario del link.
     */
    public function newspaper()
    {
        return $this->belongsTo('App\Newspaper')
                    ->with('province');
    }

    /**
     * Obtener el scraping del link.
     */
    public function scraping()
    {
        return $this->belongsTo('App\Scraping')
                    ->select(['id', 'title', 'src', 'content']);
    }
}
