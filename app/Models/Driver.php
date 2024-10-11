<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
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

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'assignments');
    }
}
