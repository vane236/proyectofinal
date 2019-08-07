<?php

namespace App;
//use App\Academias;
//use App\Maestros;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
   //protected $guarded = [];
   // Relación con academias N-N
   public function academias()
   {   
      return $this->belongsToMany(Academias::class);
   }

   // Relación con maestros N-N
   public function maestros()
   {   
      return $this->belongsToMany(Maestros::class);
   }

   // Relación con alumnos
   public function alumnos()
   {
   return $this->belongsToMany(Alumnos::class)
         ->withPivot(['calificacion']);
   }
   

   // Relación con horarios N-N
   public function horarios()
   {   
      return $this->belongsToMany(Horarios::class);
   }
    
}
