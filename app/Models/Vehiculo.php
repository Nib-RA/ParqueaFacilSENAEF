<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';
    protected $primaryKey = 'placa';
    //public $timestamps = false;

    protected $casts = [
        'modelo' => 'integer',
        'cilindraje' => 'integer',
        'documento_pro' => 'integer'
    ];

    protected $fillable = [
        'placa',
        'tipo',
        'marca',
        'linea',
        'modelo',
        'servicio',
        'cilidraje',
        'chasis',
        'motor',
        'color',
        'tipo_carroceria',
        'documento_pro'
    ];
}
