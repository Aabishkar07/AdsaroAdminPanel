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
        Schema::create('client_details', function (Blueprint $table) {
            $table->id();
                        $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->string('referred_by_name')->nullable();
            $table->string('referred_by_phone', 50)->nullable();
            $table->string('bank_account')->nullable();
            $table->string('amc')->nullable();
            $table->string('quotation_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_details');
    }
};
