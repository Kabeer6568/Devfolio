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
         Schema::table('projects', function (Blueprint $table) {
        // ✅ Add new columns
        $table->string('tags')->nullable()->after('live_link');
        $table->enum('status', ['published', 'draft'])->default('draft')->after('tags');
        $table->dropColumn('image');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
        // Reverse — drop added, re-add removed
        $table->dropColumn(['tags', 'Status']);
        $table->string('image')->nullable();
    });
    }
};
