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
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->unique(); // e.g. TKT-2026-8910
            $table->foreignId('account_id')->constrained('accounts')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('subject');
            $table->string('category')->index(); // Corporate Secretarial, Tax Advisory, Portal & Access, Compliance
            $table->string('priority')->default('Normal')->index(); // Low, Normal, High, Urgent
            $table->string('status')->default('Open')->index(); // Open, In Progress, Resolved, Awaiting Client Response
            $table->text('message');
            $table->string('last_reply_by')->nullable();
            $table->timestamp('last_reply_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
