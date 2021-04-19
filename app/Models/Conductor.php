<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    protected $table = 'propietarios';
    protected $primaryKey = 'documento';
    public $timestamps = false;

    protected $casts = [
        'documento' => 'integer',
        'fecha_nacimiento' => 'date'
    ];

    protected $fillable = [
        'documento',
        'tipo_documento',
        'nombres',
        'apellidos',
        'direccion',
        'telefono',
        'correo',
        'fecha_nacimiento',
        'genero',
        'cargo',
        'tipo_licencia',
        'numero_licencia'
    ];
}
