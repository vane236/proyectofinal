<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use App\Cursos;

class Maestros extends Authenticatable
{
    use Notifiable;

    protected $guard = 'maestros'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'apellidoPaterno', 'apellidoMaterno',
        'telefono', 'email', 'password', 'Foto'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Relación con cursos
    public function cursos()
    {   
       return $this->belongsToMany(Cursos::class);
    }
}
