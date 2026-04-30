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
            $table->string('title', 200);
            $table->text('description')->nullable();
            $table->string('bible_verse', 100);
            $table->string('video_url', 200)->nullable();
            $table->integer('category');
            $table->date('date');
            $table->time('time');

            $table->foreignId('liturgical_calendars_id')->nullable()->constrained('liturgical_calendars')->nullOnDelete();
            $table->foreignId('preachers_id')->nullable()->constrained('preachers')->nullOnDelete();

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
