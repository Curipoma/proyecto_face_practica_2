<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;
    
    public function curso_aprobados(){
        return $this->belongsTo('App\Models\Curso_Aprobado')->withTimesTamps();
    }
}
