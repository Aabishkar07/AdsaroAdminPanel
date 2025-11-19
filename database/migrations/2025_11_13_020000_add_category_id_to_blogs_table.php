<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('blogs') && !Schema::hasColumn('blogs', 'category_id')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->unsignedBigInteger('category_id')->nullable()->after('keywords');
                $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('blogs') && Schema::hasColumn('blogs', 'category_id')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            });
        }
    }
};
