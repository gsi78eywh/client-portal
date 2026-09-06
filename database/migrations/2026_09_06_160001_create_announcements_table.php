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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->index(); // SEC & Legal, Tax & BIR, System Notice, Holiday Advisory
            $table->string('badge_color')->default('blue'); // blue, emerald, indigo, amber
            $table->date('published_at')->nullable()->index();
            $table->boolean('is_pinned')->default(false)->index();
            $table->string('read_time')->default('3 min read');
            $table->string('author')->nullable();
            $table->text('summary');
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
