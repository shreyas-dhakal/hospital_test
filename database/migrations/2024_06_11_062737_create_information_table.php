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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string("logo");
            $table->text("footer");
            $table->string("story_image");
            $table->text("story1");
            $table->text("story2");
            $table->string("vision_image");
            $table->text("vision");
            $table->string("greeting_image");
            $table->text("greeting");
            $table->string("message_image");
            $table->text("message");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
