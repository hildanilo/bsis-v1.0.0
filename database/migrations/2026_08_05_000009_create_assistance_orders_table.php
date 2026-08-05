<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assistance_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assembly_order_id')->nullable()->constrained('assembly_orders')->nullOnDelete();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->foreignId('fitter_id')->nullable()->constrained('fitters')->nullOnDelete();
            $table->string('status')->default('pendente'); // pendente, em_atendimento, concluida, cancelada
            $table->text('defeito')->nullable();
            $table->text('solucao')->nullable();
            $table->date('data_atendimento')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assistance_orders');
    }
};
