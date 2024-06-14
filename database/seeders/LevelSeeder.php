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
                $levelNamesEn = [
                    'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'
                ];

                $levelNamesAr = [
                    'الأول', 'الثاني', 'الثالث', 'الرابع', 'الخامس', 'السادس', 'السابع', 'الثامن', 'التاسع'
                ];


                $levels = [];

                for ($i = 0; $i < count($levelNamesEn); $i++) {
                    $levels[] = [
                        'name_en' => 'Level ' . $levelNamesEn[$i],
                        'name_ar' => 'المستوى ' . $levelNamesAr[$i]
                    ];
                }

                // Insert data into the levels table
                foreach ($levels as $level) {
                    Level::create($level);
                }
    }
}
