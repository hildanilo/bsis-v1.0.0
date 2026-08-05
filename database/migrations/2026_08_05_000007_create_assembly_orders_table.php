<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assembly_orders', function (Blueprint $table) {
            $table->id();
            $table->string('numero_controle')->nullable()->index();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->foreignId('fitter_id')->nullable()->constrained('fitters')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('closure_id')->nullable()->constrained('closures')->nullOnDelete();
            $table->string('status')->default('pendente'); // pendente, em_montagem, concluida, cancelada
            $table->date('data_montagem')->nullable();
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assembly_orders');
    }
};
