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
        // Create the modes table first
        Schema::create('modes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        }); 

        // Then create the questions table
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('good_answer');
            $table->string('false_answer1')->nullable();
            $table->string('false_answer2')->nullable();
            $table->string('false_answer3')->nullable();
            $table->foreignId('mode_id')->constrained('modes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
        Schema::dropIfExists('modes');
    }
};