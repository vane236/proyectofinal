<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    
    public function alumno()
    {
        return $this->belongsTo(Alumnos::class, 'alumno_id');
    }

}
