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
            $table->string('logo');
            $table->string('header_text');
            $table->longText('header_script');
            $table->longText('desktop_sidebar_script');
            $table->longText('mobile_sidebar_script');
            $table->longText('before_content_script');
            $table->longText('after_content_script');
            $table->longText('footer_text');
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
