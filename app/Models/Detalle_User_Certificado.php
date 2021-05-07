<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_User_Certificado extends Model
{
    use HasFactory;

    public function curso_aprobado(){
        return $this->belongsTo('App\Models\Curso_Aprobado')->withTimesTamps();
    }
}
