<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Sample data for levels
                $levels = [
                    ['name_en' => 'Beginner', 'name_ar' => 'مبتدئ'],
                    ['name_en' => 'Intermediate', 'name_ar' => 'متوسط'],
                    ['name_en' => 'Advanced', 'name_ar' => 'متقدم'],
                ];

                // Insert data into the levels table
                foreach ($levels as $level) {
                    Level::create($level);
                }
    }
}
