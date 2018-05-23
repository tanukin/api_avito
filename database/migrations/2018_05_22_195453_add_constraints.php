<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('categories');
        });

        Schema::table('advertisements', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('images', function (Blueprint $table) {
            $table->foreign('advertisement_id')->references('id')->on('advertisements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign('categories_parent_id_foreign');
        });

        Schema::table('advertisements', function (Blueprint $table) {
            $table->dropForeign('advertisements_category_id_foreign');
            $table->dropForeign('advertisements_city_id_foreign');
            $table->dropForeign('advertisements_user_id_foreign');
        });

        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign('images_advertisement_id_foreign');
        });
    }
}
