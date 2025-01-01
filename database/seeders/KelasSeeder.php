<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            $kelasData = [];
    
            // Generate 100 data secara manual
            for ($i = 1; $i <= 100; $i++) {
                $kelasData[] = [
                    'class_name' => 'Kelas ' . $i,
                    'grade' => 'Grade ' . (($i % 6) + 1), // Rotasi grade dari 1 hingga 6
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
    
            // Insert data ke tabel
            DB::table('kelas')->insert($kelasData);
        
    }
}
