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
        Schema::create('devotions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('bible_verse');
            $table->string('author');
            $table->integer('category');

            $table->foreignId('users_id')->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devotions');
    }
};
