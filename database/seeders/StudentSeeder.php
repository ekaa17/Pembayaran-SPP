<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studentsData = [];

        // Generate 100 data students secara manual
        for ($i = 1; $i <= 100; $i++) {
            $studentsData[] = [
                'nis' => 'NIS' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'name' => 'Student ' . $i,
                'kelas_id' => ($i % 10) + 1, // Rotasi kelas_id dari 1 hingga 10
                'birth_date' => now()->subYears(15)->subDays($i), // Simulasi tanggal lahir berbeda
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data ke tabel
        DB::table('students')->insert($studentsData);
    }
}
