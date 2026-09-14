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
        Schema::create('document_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('record_no', 50)->index();
            $table->string('title');
            $table->string('classification', 100)->index();
            $table->string('subclass', 100)->nullable();
            $table->string('source', 100)->nullable();
            $table->string('document_number', 100)->nullable();
            $table->date('record_date')->nullable();
            $table->string('status', 50)->default('Active');
            $table->string('status_badge_class', 50)->default('active');
            $table->string('ocr_status', 50)->default('Completed');
            $table->text('ocr_summary')->nullable();
            $table->text('description')->nullable();
            $table->json('tags')->nullable();
            $table->json('metadata')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->unsignedBigInteger('file_size_bytes')->default(0);
            $table->string('file_type', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_records');
    }
};
