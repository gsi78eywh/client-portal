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
        Schema::create('billing_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->cascadeOnDelete();
            $table->string('invoice_number')->unique(); // e.g. INV-2026-0882
            $table->string('description');
            $table->string('period')->nullable(); // e.g. August 2026
            $table->date('issued_date')->index();
            $table->date('due_date')->index();
            $table->decimal('amount', 12, 2)->default(0.00);
            $table->string('status')->default('Pending Payment')->index(); // Paid, Pending Payment, Overdue
            $table->date('paid_at')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_invoices');
    }
};
