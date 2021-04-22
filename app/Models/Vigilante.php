<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Vigilante extends Model
{
    use HasFactory;

    protected $table = 'vigilante';
    protected $primaryKey = 'documento';
    public $timestamps = false;

    protected $casts = [
        'documento' => 'integer',
        'documento_adm' => 'integer'
    ];

    protected $hidden = [
        'contrasena'
    ];

    protected $fillable = [
        'documento',
        'nombres',
        'turno',
        'rol',
        'contrasena',
        'documento_adm'
    ];

    public function encrypt ($contrasena)
    {
        return Hash::make($contrasena);;
    }
}
