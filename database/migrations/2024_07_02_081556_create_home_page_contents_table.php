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
        Schema::create('home_page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('bannerSec_video')->nullable();
            $table->string('bannerSec_heading')->nullable();
            $table->string('bannerSec_logo')->nullable();
            $table->string('bannerSec_bgimage')->nullable();
            $table->longText('bannerSec_text')->nullable();
            $table->longText('aboutSec_text')->nullable();
            $table->longText('aboutSec_activeheading')->nullable();
            $table->string('aboutSec_subheading')->nullable();
            $table->string('clientSec_heading')->nullable();
            $table->longText('clientSec_text')->nullable();
            $table->string('contentSec_heading')->nullable();
            $table->longText('contentSec_text')->nullable();
            $table->string('contentSec_image')->nullable();
            $table->string('contentSec_simage')->nullable();
            $table->string('expertpicks_heading')->nullable();
            $table->json('expertpicks_logos')->nullable();
            $table->string('join_us_heading')->nullable();
            $table->longText('join_us_text')->nullable();
            $table->string('join_us_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_contents');
    }
};
