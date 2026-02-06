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
    Schema::table('users', function (Blueprint $table) {
        $table->foreignId('university_id')->nullable()->after('email')->constrained()->nullOnDelete();
        $table->string('role')->default('standard')->after('university_id'); // standard | premium | admin
        $table->string('profile_photo')->nullable()->after('role');
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropConstrainedForeignId('university_id');
        $table->dropColumn(['role', 'profile_photo']);
    });
}

};
