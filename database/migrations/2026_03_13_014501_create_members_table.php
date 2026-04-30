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
            $table->string('name', 200);
            $table->string('address', 200);
            $table->integer('gender');
            $table->integer('status');
            $table->string('phone_number', 20)->nullable();
            $table->date('birth_date');
            $table->date('join_date');
            $table->integer('membership');
            $table->boolean('is_active');
            $table->boolean('is_region_leader');

            $table->foreignId('users_id')->constrained('users');
            $table->foreignId('regions_id')->nullable()->constrained('regions')->nullOnDelete();
            $table->foreignId('commissions_id')->nullable()->constrained('commissions')->nullOnDelete();

            // $table->timestamps();
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
