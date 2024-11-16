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
        Schema::table('meta_tags', function (Blueprint $table) {
            $table->string('canonical_link')->nullable()->after('meta_description');
            $table->text('schema_markup')->nullable()->after('canonical_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('meta_tags', function (Blueprint $table) {
            $table->dropColumn(['canonical_link', 'schema_markup']);
        });
    }
};
