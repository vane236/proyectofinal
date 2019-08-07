<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    // Relación con cursos N-N
    public function cursos()
    {   
       return $this->belongsToMany(Cursos::class);
    }
}
