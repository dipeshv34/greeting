<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('category_id')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('back_image')->nullable();
            $table->string('center_image')->nullable();
            $table->string('bottom_image')->nullable();
            $table->text('content')->nullable();
            $table->string('content_color')->nullable();
            $table->longText('bottom_contents')->nullable();
            $table->longText('seo_content')->nullable();
            $table->longText('wishing_title')->nullable();
            $table->enum('status',['active','inactive'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
};
