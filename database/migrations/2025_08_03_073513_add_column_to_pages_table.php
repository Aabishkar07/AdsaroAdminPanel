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
        Schema::table('pages', function (Blueprint $table) {
            if (!Schema::hasColumn('pages', 'third_description')) {
                $table->longText('third_description')->nullable();
            }
            if (!Schema::hasColumn('pages', 'third_image')) {
                $table->string('third_image')->nullable();
            }
            if (!Schema::hasColumn('pages', 'fourth_description')) {
                $table->longText('fourth_description')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            if (Schema::hasColumn('pages', 'third_description')) {
                $table->dropColumn('third_description');
            }
            if (Schema::hasColumn('pages', 'third_image')) {
                $table->dropColumn('third_image');
            }
            if (Schema::hasColumn('pages', 'fourth_description')) {
                $table->dropColumn('fourth_description');
            }
        });
    }
};
