<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vigilante extends Model
{
    use HasFactory;

    protected $table = 'vigilante';
    protected $primaryKey = 'documento';
    //public $timestamps = false;

    protected $casts = [
        'documento' => 'integer',
        'documento_adm' => 'integer'
    ];

    protected $fillable = [
        'documento',
        'nombres',
        'turno',
        'rol',
        'contrasena',
        'documento_adm'
    ];
}
