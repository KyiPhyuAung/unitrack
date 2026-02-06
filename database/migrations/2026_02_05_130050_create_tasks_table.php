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
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')->constrained()->cascadeOnDelete();

        $table->string('title');
        $table->text('description')->nullable();

        $table->date('task_date');
        $table->time('task_time')->nullable();

        // red | green | blue | yellow | purple (you can add more later)
        $table->string('priority_color')->default('blue');

        // pending | ongoing | done
        $table->string('status')->default('pending');

        // optional: for notifications later
        $table->dateTime('notify_at')->nullable();

        $table->timestamps();

        $table->index(['user_id', 'task_date']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
