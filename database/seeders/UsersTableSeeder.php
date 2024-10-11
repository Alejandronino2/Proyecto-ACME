<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first(); 
        $empresaRole = Role::where('name', 'empresa')->first(); 

        User::create([
            'name' => 'Administrador',
            'email' => 'alejandronino@hibridcode.com',
            'password' => Hash::make('password'), 
            'role_id' => $adminRole->id,
        ]);

        User::create([
            'name' => 'Empresa ACME',
            'email' => 'nicolasnino@hibridcode.com',
            'password' => Hash::make('password'), 
            'role_id' => $adminRole->id,
        ]);

    }
}
