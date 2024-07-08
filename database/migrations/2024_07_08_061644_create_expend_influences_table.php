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
        Schema::create('expend_influences', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->longText('text')->nullable();
            $table->string('video_before')->nullable();
            $table->string('video_after')->nullable();
            $table->string('image_before')->nullable();
            $table->string('image_after')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expend_influences');
    }
};
