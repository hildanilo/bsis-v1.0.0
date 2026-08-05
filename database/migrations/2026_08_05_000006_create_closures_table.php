<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('closures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();
            $table->foreignId('fitter_id')->constrained('fitters')->cascadeOnDelete();
            $table->date('periodo_inicio')->nullable();
            $table->date('periodo_fim')->nullable();
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->string('status')->default('aberto'); // aberto, fechado, pago
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('closures');
    }
};
