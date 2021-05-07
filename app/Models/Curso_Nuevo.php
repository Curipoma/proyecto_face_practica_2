<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso_Nuevo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'horas', 'información'
    ];

}
