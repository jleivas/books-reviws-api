<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Un usuario puede agregar tantos libros como desee, pero un libro 
     * solo puede pertenecer a un usuario. Entonces, la relación entre 
     * el modelo de usuario y el modelo de libro es una one-to-manyrelación. 
     * Vamos a definir eso. Agregue el siguiente código dentro del modelo de usuario
     */
    public function books()
    {
      return $this->hasMany(Book::class);
    }

    /**
     * composer require tymon/jwt-auth "1.0.*"
     * 
     * con ese comando
     * estaremos asegurando nuestra API al agregar autenticación de usuario con JWT. 
     * Para esto, haremos uso de un paquete llamado jwt-auth
     * 
     * Luego de instalar se publica el archivo de configuracion del paquete con
     * 
     * php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
     * 
     * mas info en https://blog.pusher.com/build-rest-api-laravel-api-resources/
     */
    public function getJWTIdentifier()
    {
      return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
      return [];
    }
}
