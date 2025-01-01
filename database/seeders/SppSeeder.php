<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sppsData = [];

        // Generate 100 data SPP secara manual
        for ($i = 1; $i <= 100; $i++) {
            $sppsData[] = [
                'amount' => rand(50000, 200000), // Nominal antara 50.000 hingga 200.000
                'description' => 'SPP bulan ke-' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data ke tabel
        DB::table('spps')->insert($sppsData);
    }
}
