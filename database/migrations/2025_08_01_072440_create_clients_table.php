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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
               $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('project_name')->nullable();
            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('status')->nullable();
            $table->boolean('deal_done')->nullable();
            $table->string('priority')->nullable();
            $table->text('remarks')->nullable();

            $table->decimal('amc_price', 10, 2)->nullable();
            $table->decimal('project_commission', 5, 2)->nullable(); // 0–100
            $table->decimal('project_price', 12, 2)->nullable();
            $table->decimal('final_price', 12, 2)->nullable();
            $table->string('reference_website')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
