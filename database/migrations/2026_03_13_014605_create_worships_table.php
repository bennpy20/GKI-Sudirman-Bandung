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
            $table->integer('category');
            $table->date('date');
            $table->time('time');

            $table->foreignId('liturgical_calendars_id')->nullable()->constrained('liturgical_calendars')->nullOnDelete();
            $table->foreignId('guest_ministers_id')->nullable()->constrained('guest_ministers')->nullOnDelete();

            // $table->timestamps();
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
