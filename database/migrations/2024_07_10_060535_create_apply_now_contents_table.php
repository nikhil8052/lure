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
        Schema::create('apply_now_contents', function (Blueprint $table) {
            $table->id();
            $table->string('bg_video')->nullable();
            $table->string('heading')->nullable();
            $table->string('sub_heading')->nullable();
            $table->string('submit_heading')->nullable();
            $table->string('submit_text')->nullable();
            $table->string('submit_gif')->nullable();
            $table->json('additional_info')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_now_contents');
    }
};
