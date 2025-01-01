<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('payments')->insert([
        //     [
        //         'student_id' => 1,
        //         'spp_id' => 1,
        //         'payment_date' => Carbon::now()->subDays(10),
        //         'amount_paid' => 500000.00,
        //         'staff_id' => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'student_id' => 2,
        //         'spp_id' => 1,
        //         'payment_date' => Carbon::now()->subDays(5),
        //         'amount_paid' => 450000.00,
        //         'staff_id' => 2,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
            
        // ]);

        $paymentsData = [];

        // Generate 100 data pembayaran secara manual
        for ($i = 1; $i <= 100; $i++) {
            $paymentsData[] = [
                'student_id' => ($i % 10) + 1, // Rotasi student_id dari 1 hingga 10
                'spp_id' => ($i % 5) + 1, // Rotasi spp_id dari 1 hingga 5
                'payment_date' => now()->subDays($i), // Tanggal pembayaran bervariasi mundur setiap data
                'amount_paid' => rand(50000, 200000), // Jumlah dibayar antara 50.000 hingga 200.000
                'staff_id' => ($i % 2) + 1, // Rotasi staff_id dari 1 hingga 3
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data ke tabel
        DB::table('payments')->insert($paymentsData);
    }
}
