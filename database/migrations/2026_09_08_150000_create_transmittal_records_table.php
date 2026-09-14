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
        Schema::create('transmittal_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('transmittal_no', 50)->index();
            $table->string('title');
            $table->string('type', 50)->index(); // Incoming, Outgoing
            $table->string('sender', 255);
            $table->string('recipient', 255);
            $table->date('transmittal_date')->nullable();
            $table->string('delivery_method', 100); // Email, Hand Delivery, Courier, Electronic, Other
            $table->date('delivery_date')->nullable();
            $table->string('status', 50)->default('Pending Receipt'); // Draft, Pending Approval, Pending Receipt, Sent, Delivered, Received, Acknowledged, Rejected
            $table->string('status_badge_class', 50)->default('pending');
            $table->text('description')->nullable();
            $table->string('acknowledged_by', 255)->nullable();
            $table->date('acknowledged_at')->nullable();
            $table->text('proof_of_receipt_note')->nullable();
            $table->string('proof_of_receipt_path')->nullable();
            $table->json('attachments')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transmittal_records');
    }
};
