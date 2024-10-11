<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Owner;

class OwnersTableSeeder extends Seeder
{
    public function run()
    {
        Owner::create([
            'primer_nombre' => 'Juan',
            'segundo_nombre' => 'Carlos',
            'apellidos' => 'Pérez Gómez',
            'cedula' => '1234567890',
            'direccion' => 'Calle Falsa 123',
            'ciudad' => 'Ciudad Ejemplo',
        ]);

        
    }
}
