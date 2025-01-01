<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade'); // ID Siswa
            $table->foreignId('spp_id')->constrained('spps'); // ID Biaya SPP
            $table->date('payment_date'); // Tanggal Pembayaran
            $table->decimal('amount_paid', 10, 2); // Jumlah Dibayar
            $table->foreignId('staff_id')->constrained('staff'); // ID Petugas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
