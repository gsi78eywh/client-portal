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
        Schema::create('governance_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('record_type', 50)->index(); // entity_profile, director_officer, ownership, meeting, resolution, corporate_record
            $table->string('reference_no', 50)->index();
            $table->string('title');
            $table->string('category', 100);
            $table->date('record_date');
            $table->string('status', 50)->default('Active');
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
        Schema::dropIfExists('governance_records');
    }
};
