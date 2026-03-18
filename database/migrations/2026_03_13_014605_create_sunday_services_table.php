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
            $table->id();
            $table->string('guest_name')->nullable();
            $table->string('role');

            $table->foreignId('members_id')->nullable()->constrained('members');
            $table->foreignId('worships_id')->constrained('worships')->cascadeOnDelete();

            $table->timestamps();
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
