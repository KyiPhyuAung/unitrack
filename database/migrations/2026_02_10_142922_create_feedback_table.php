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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // user can choose a display name (or we fallback to user->name)
            $table->string('display_name')->nullable();

            // store emoji like "😍" or "🔥"
            $table->string('emoji', 8)->default('💬');

            $table->text('message');

            $table->boolean('is_public')->default(true); // show on main UI
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
