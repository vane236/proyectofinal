<?php

namespace App;

//use App\Cursos;
use Illuminate\Database\Eloquent\Model;

class Academias extends Model
{   
    // Relación con cursos N - N
    public function cursos()
    {   
        return $this->belongsToMany(Cursos::class);
    }
}
