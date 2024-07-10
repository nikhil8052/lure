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
        Schema::create('site_contents', function (Blueprint $table) {
            $table->id();
            $table->string('site_logo')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_number')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('site_copyrights')->nullable();
            $table->longText('company_address')->nullable();
            $table->string('subscribe_sec_heading')->nullable();
            $table->string('subscribe_sec_text')->nullable();
            $table->string('site_message')->nullable();
            $table->longText('about_team')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_contents');
    }
};
