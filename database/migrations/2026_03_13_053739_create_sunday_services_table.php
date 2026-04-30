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
        Schema::create('sunday_services', function (Blueprint $table) {

            $table->foreignId('members_id')->constrained('members')->cascadeOnDelete();
            $table->foreignId('worships_id')->constrained('worships')->cascadeOnDelete();
            $table->foreignId('stewards_id')->constrained('stewards')->cascadeOnDelete();

            // $table->timestamps();

            $table->primary(['members_id','worships_id', 'stewards_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sunday_services');
    }
};
