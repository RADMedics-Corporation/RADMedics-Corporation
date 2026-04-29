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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description');
            $table->enum('mode_of_learning', ['Online', 'F2F', 'Hybrid F2F'])
                  ->default('Online');
            $table->string('thumbnail')->nullable();        // file path only
            $table->timestamp('published_at')->nullable();  // not published if null
            $table->timestamps();
            $table->softDeletes();
            $table->index(['is_published', 'published_at']);
        });
   }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
