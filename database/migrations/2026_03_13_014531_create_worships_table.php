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
        Schema::create('worships', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('bible_verse');
            $table->string('video_url')->nullable();
            $table->integer('session');
            $table->date('date');
            
            $table->foreignId('liturgical_calendars_id')->constrained('liturgical_calendars');
            $table->foreignId('guest_ministers_id')->constrained('guest_ministers');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worships');
    }
};
