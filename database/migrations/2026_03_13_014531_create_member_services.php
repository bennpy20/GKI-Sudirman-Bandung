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
        Schema::create('member_services', function (Blueprint $table) {
            $table->foreignId('members_id')->constrained('members')->cascadeOnDelete();
            $table->foreignId('stewards_id')->constrained('stewards')->cascadeOnDelete();

            $table->primary(['members_id','stewards_id']);

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_services');
    }
};
