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
        if (!Schema::hasColumn('pages', 'secondary_description')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->string('secondary_description')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('pages', 'secondary_description')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->dropColumn('secondary_description');
            });
        }
    }
};
