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
        Schema::create('dos_donts', function (Blueprint $table) {
            $table->id();
            $table->string('skin_condition');
            $table->string('skin_dream');
            $table->enum('group', ['dos', 'donts']);
            $table->string('todo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dos_donts');
    }
};
