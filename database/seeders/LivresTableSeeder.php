<?php

namespace Database\Seeders;

use App\Models\Livre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LivresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Livre::truncate();  //Deletes all existing books before inserting new ones
        // Livre::factory()->count(20)->create(); // Always adds 20 new books
        Livre::factory(100)->create();

    }
}
