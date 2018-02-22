<?php

namespace App;

use App\Scopes\LocationScope;
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
        'story_id',
        'parent_id',
        'country_id',
        'province_id',
        'newspaper_id',
        'category_id',
        'image_id',
        'title',
        'summary',
        'url',
        'url_hash',
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
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new LocationScope);
    }

    /**
     * Obtener la story.
     */
    public function story()
    {
        return $this->belongsTo('App\Story');
    }

    /**
     * Obtener el país del post.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Obtener la provincia del post.
     */
    public function province()
    {
        return $this->belongsTo('App\Province');
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
    
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }
    
    /**
     * Obtener la imagen.
     */
    public function image()
    {
        return $this->belongsTo('App\Image');
    }
}
