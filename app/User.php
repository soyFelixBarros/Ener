<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Obtener todos los roles del usuario.
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * Verificar el rol del usuario.
     */
    public function hasRole($slug)
    {
        if (is_string($slug) && $this->role !== null) {
            return $this->role->slug === $slug;
        }

        return false;
    }

    /**
     * Obtenga todas las publicaciones favoritas para el usuario.
     */
    public function favorites()
    {
        return $this->belongsToMany('App\Post', 'favorites', 'user_id', 'post_id')->withTimeStamps();
    }
}
