<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'filters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'link',
        'title',
        'image',
        'text',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'source_id',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtener la fuente del filtro.
     */
    public function source()
    {
        return $this->belongsTo('App\Source');
    }
}
