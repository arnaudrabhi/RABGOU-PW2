<?php

namespace Database\Seeders;

use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 25 random User
        User::factory(25)->create();

        // Roles
        foreach ([1 => 'Administrateur', 2 => 'Administration', 3 => 'Enseignant', 4 => 'Eleve'] as $key => $value) {
            Role::factory()->create(['id' => $key, 'libelle_role' => $value]);
        }

    }
}
