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
        Schema::create('engagements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->cascadeOnDelete();
            $table->string('code')->unique(); // e.g. ENG-2026-0041
            $table->string('title');
            $table->string('category')->index(); // Corporate Legal, Tax Advisory, Audit & Assurance, etc.
            $table->string('lead_partner')->nullable();
            $table->string('period')->nullable(); // e.g. Jan 01, 2026 – Dec 31, 2026
            $table->text('scope');
            $table->unsignedTinyInteger('progress')->default(0); // 0 to 100
            $table->string('status')->default('In Progress')->index(); // In Progress, Completed, Draft
            $table->string('status_color')->default('blue');
            $table->string('deliverables')->nullable();
            $table->string('billing_ref')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engagements');
    }
};
