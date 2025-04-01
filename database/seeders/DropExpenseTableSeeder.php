<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DropExpenseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprimer la table expenses si elle existe
        if (Schema::hasTable('expenses')) {
            // D'abord supprimer la contrainte de clé étrangère si elle existe
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            
            // Supprimer la table
            Schema::dropIfExists('expenses');
            
            // Réactiver les vérifications de clé étrangère
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            
            $this->command->info('Table expenses supprimée avec succès!');
        } else {
            $this->command->info('La table expenses n\'existe pas!');
        }
    }
}
