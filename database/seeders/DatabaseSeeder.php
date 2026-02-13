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
        $this->call([
            ArticleSeeder::class,
            PropertySeeder::class,
        ]);

        $this->seedUsers(); // inicializa usuarios
    }


    //CREACION DE USUARIOS
    public function seedUsers(): void
    {
        User::truncate(); // vacio la tabla users

        $users = [
            [
                'id' => 1,
                'name' => "María García López",
                'email' => "maria.garcia@email.com",
                'registrationDate' => "2026-01-15",
                'phone' => "+34 612 345 678",
                'lastLogin' => "2026-02-09",
                'password' => bcrypt('password123'),
                'role' => 'moderator',
            ],
            [
                'id' => 2,
                'name' => "Juan Martínez Ruiz",
                'email' => "juan.martinez@email.com",
                'registrationDate' => "2026-01-20",
                'phone' => "+34 623 456 789",
                'lastLogin' => "2026-02-10",
                'password' => bcrypt('password123'),
                'role' => 'user',
            ],
            [
                'id' => 3,
                'name' => "Ana Fernández Sánchez",
                'email' => "ana.fernandez@email.com",
                'registrationDate' => "2026-01-25",
                'phone' => "+34 634 567 890",
                'lastLogin' => "2026-02-08",
                'password' => bcrypt('password123'),
                'role' => 'user',
            ],
            [
                'id' => 4,
                'name' => "Carlos López Pérez",
                'email' => "carlos.lopez@email.com",
                'registrationDate' => "2026-02-01",
                'phone' => "+34 645 678 901",
                'lastLogin' => "2026-02-10",
                'password' => bcrypt('password123'),
                'role' => 'user',
            ],
            [
                'id' => 5,
                'name' => "Laura Rodríguez Gómez",
                'email' => "laura.rodriguez@email.com",
                'registrationDate' => "2026-02-05",
                'phone' => "+34 656 789 012",
                'lastLogin' => "2026-02-09",
                'password' => bcrypt('password123'),
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
