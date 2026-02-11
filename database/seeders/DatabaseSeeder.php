<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->seedUsers(); // inicializa usuarios
    }


    //CREACION DE USUARIOS
    public function seedUsers():void{
        User::truncate(); // vacio la tabla users

        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@example.com',
            'password' => bcrypt('cliente123'),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'Admin@example.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}
