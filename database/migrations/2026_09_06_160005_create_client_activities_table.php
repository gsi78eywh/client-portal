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
        Schema::create('client_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->date('activity_date')->index();
            $table->string('engagement_code')->nullable();
            $table->string('title');
            $table->string('consultant_name')->nullable();
            $table->decimal('hours_spent', 5, 2)->default(0.00);
            $table->boolean('is_billable')->default(true);
            $table->string('type')->default('activity')->index(); // 'activity' or 'report'
            $table->string('deliverable_name')->nullable();
            $table->string('status')->default('Completed')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_activities');
    }
};
