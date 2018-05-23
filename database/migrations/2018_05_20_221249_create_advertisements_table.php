<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->unsignedInteger('price');
            $table->text('description');
            $table->unsignedInteger('category_id')->index();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('user_id');
            $table->string('address', 50)->nullable();
            $table->string('phone', 12);
            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('visitors')->default(0);
            $table->boolean('archived')->default(false);
            $table->boolean('published')->default(false);
            $table->boolean('cancelled')->nullable();
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('publish_date');
            $table->timestamp('cancel_date');
            $table->timestamp('archive_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
