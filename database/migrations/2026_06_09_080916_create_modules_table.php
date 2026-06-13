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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')
                  ->constrained()
                  ->cascadeOnDelete();
            $table->integer('sort_order')->index();
            $table->timestamp('published_at')->nullable();
            $table->string('title')->default('Unnamed Module');
            $table->unique(['course_id', 'sort_order']);
            $table->timestamps();

        });

        Schema::table('courses', function (Blueprint $table) {
            $table->foreignId('instructor_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();
        });

        Schema::create('course_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')
                  ->constrained()
                  ->cascadeOnDelete();
            $table->foreignId('student_id')
                  ->constrained('users')
                  ->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['course_id', 'student_id']);
        });

        Schema::create('module_completions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')
                  ->constrained()
                  ->cascadeOnDelete();
            $table->foreignId('student_id')
                  ->constrained('users')
                  ->cascadeOnDelete();
            $table->timestamp('completed_at');
            $table->timestamps();
            $table->unique(['module_id', 'student_id']);
        });

        Schema::create('submodules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')
                  ->constrained('modules')
                  ->cascadeOnDelete();
            $table->string('title')->default('Unnamed Submodule');
            $table->timestamp('published_at')->nullable();
            $table->enum('type', [
                'text',
                'image',
                'pdf',
                'quiz',
            ]);
            $table->json('content');
            $table->integer('sort_order')->index();
            $table->unique(['module_id', 'sort_order']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_contents');
        Schema::dropIfExists('module_completions');
        Schema::dropIfExists('course_student');
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['instructor_id']);
            $table->dropColumn('instructor_id');
        });
        Schema::dropIfExists('modules');
    }
};
