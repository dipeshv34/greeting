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
        Schema::table('customizations', function (Blueprint $table) {
            $table->string('favicon')->nullable();
            $table->string('title')->nullable();
            $table->string('logo')->nullable()->change();
            $table->string('header_text')->nullable()->change();
            $table->longText('header_script')->nullable()->change();
            $table->longText('desktop_sidebar_script')->nullable()->change();
            $table->longText('mobile_sidebar_script')->nullable()->change();
            $table->longText('before_content_script')->nullable()->change();
            $table->longText('after_content_script')->nullable()->change();
            $table->longText('footer_text')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customizations', function (Blueprint $table) {
            $table->dropColumn('favicon');
            $table->dropColumn('title');
            $table->string('logo')->nullable(false)->change();
            $table->string('header_text')->nullable(false)->change();
            $table->longText('header_script')->nullable(false)->change();
            $table->longText('desktop_sidebar_script')->nullable(false)->change();
            $table->longText('mobile_sidebar_script')->nullable(false)->change();
            $table->longText('before_content_script')->nullable(false)->change();
            $table->longText('after_content_script')->nullable(false)->change();
            $table->longText('footer_text')->nullable(false)->change();
        });
    }
};
