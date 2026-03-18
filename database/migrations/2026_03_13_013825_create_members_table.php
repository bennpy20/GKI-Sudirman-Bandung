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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->integer('status')->nullable();
            $table->string('phone_number',20)->nullable();
            $table->date('birth_date')->nullable();
            $table->date('join_date')->nullable();
            $table->integer('membership')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_region_leader')->default(false);

            $table->foreignId('users_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('regions_id')->constrained('regions');
            $table->foreignId('commissions_id')->constrained('commissions');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
