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
        Schema::create('task_manager', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subject');
            $table->date('due_date');
            $table->enum('priority', ['least', 'neutral', 'prioritize']);
            $table->enum('status', ['pending', 'in_progress', 'completed']);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_manager');
    }
};
