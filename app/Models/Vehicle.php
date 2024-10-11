<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'tipo',
        'marca',
        'propietario_id',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'propietario_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function drivers()
    {
        return $this->belongsToMany(Driver::class, 'assignments');
    }
}
