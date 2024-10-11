<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'apellidos',
        'cedula',
        'direccion',
        'ciudad',
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'propietario_id');
    }
}
