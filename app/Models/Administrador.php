<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $table = 'administradors';
    protected $primaryKey = 'documento';
    public $timestamps = false;

    protected $casts = [
        'documento' => 'integer'
    ];

    protected $hidden = [
        'contrasena'
    ];

    protected $fillable = [
        'documento',
        'nombres',
        'cargo',
        'contrasena'
    ];
}
