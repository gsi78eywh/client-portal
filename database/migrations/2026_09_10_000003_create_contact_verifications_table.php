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
        Schema::create('contact_verifications', function (Blueprint $table) {
            $table->id();
            $table->string('channel', 20); // 'email' or 'sms'
            $table->string('destination', 255)->index(); // email or normalized phone number
            $table->string('otp_code', 10);
            $table->unsignedTinyInteger('attempts')->default(0);
            $table->unsignedTinyInteger('max_attempts')->default(5);
            $table->timestamp('expires_at');
            $table->timestamp('resend_available_at');
            $table->timestamp('verified_at')->nullable();
            $table->string('session_id', 255)->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_verifications');
    }
};
