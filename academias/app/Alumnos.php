<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    // Relación con cursos
    public function cursos()
    {
        return $this->belongsToMany(Cursos::class);
    }

    // Relacion con pagos
    public function pagos()
    {
        return $this->hasMany(Pagos::class);
    }
}
