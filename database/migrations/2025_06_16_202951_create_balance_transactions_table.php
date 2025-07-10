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
        Schema::create('balance_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('balance_id')->nullable()->constrained()->onDelete('set null');
            $table->string('transaction_type'); //'top_up', 'withdrawal'
            $table->decimal('amount', 15, 2);
            $table->string('reference_type')->nullable(); //'MidtransPayment'
            $table->string('reference_id')->nullable();  //'order-xxxx'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_transactions');
    }
};
