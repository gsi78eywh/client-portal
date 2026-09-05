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
        Schema::create('account_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('account_id')
                ->unique()
                ->constrained('accounts')
                ->cascadeOnDelete();

            $table->string('account_type', 100)->nullable();

            $table->string('legal_name', 255)->nullable();

            $table->string('trade_name', 255)->nullable();

            $table->string('tin', 50)->nullable();

            $table->string('registration_number', 100)->nullable();

            $table->string('registration_authority', 150)->nullable();

            $table->date('registration_date')->nullable();

            $table->string('industry_profession', 150)->nullable();

            $table->text('primary_address')->nullable();

            $table->string('business_email', 255)->nullable();

            $table->string('contact_number', 30)->nullable();

            $table->string('website', 255)->nullable();

            $table->string('logo_path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_profiles');
    }
};