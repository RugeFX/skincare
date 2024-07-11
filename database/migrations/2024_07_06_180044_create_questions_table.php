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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('label')->unique();
            $table->string('icon')->nullable();
            $table->string('question');
            $table->enum('group', ['kulit', 'gaya-hidup'])->nullable();
            $table->string('description')->nullable();
            $table->integer('order');
            $table->enum('answer_type', ['single', 'multiple'])->default('single');
            $table->timestamps();

            $table->unique(['group', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
