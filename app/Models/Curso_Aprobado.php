<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso_Aprobado extends Model
{
    use HasFactory;
    
    public function encuesta(){
        return $this->hasMany('App\Models\Encuesta')->withTimesTamps();
    }
    public function detalle_cetificado_users(){
        return $this->hasMany('App\Models\Detalle_Certificado_Usuario')->withTimesTamps();
    }
}
