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
        Schema::create('human_capital_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('record_type', 50)->index(); // employee, hr_document, attendance, leave
            $table->string('reference_no', 50)->index();
            $table->string('title');
            $table->string('category', 100)->nullable()->index();
            $table->date('record_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('status', 50)->default('Active')->index();
            $table->string('status_badge_class', 50)->default('active');
            $table->text('description')->nullable();
            $table->json('metadata')->nullable();
            $table->string('attachment_path')->nullable();
            $table->string('attachment_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('human_capital_records');
    }
};
