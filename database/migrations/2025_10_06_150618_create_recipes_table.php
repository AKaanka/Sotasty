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
         Schema::create('recipes', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->id();

        // these TWO lines are crucial
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->foreignId('cat_id')->constrained('categories')->cascadeOnDelete();

        $table->string('title');
        $table->text('description');
        $table->timestamps();

        $table->index(['user_id','cat_id']);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
