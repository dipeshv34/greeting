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
        Schema::create('customizations', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('header_text')->nullable();
            $table->longText('header_script')->nullable();
            $table->longText('desktop_sidebar_script')->nullable();
            $table->longText('mobile_sidebar_script')->nullable();
            $table->longText('before_content_script')->nullable();
            $table->longText('after_content_script')->nullable();
            $table->longText('footer_text')->nullable();
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
        Schema::dropIfExists('customizations');
    }
};
