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
        'url',
        'active',
    ];

    /**
     * Obtener el diario del link.
     */
    public function newspaper()
    {
        return $this->belongsTo('App\Newspaper');
    }
}
