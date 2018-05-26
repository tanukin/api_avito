<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('user_id', 36);
            $table->string('address', 50)->nullable();
            $table->string('phone', 12);
            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('visitors')->default(0);
            $table->boolean('archived')->default(false);
            $table->boolean('published')->default(false);
            $table->boolean('cancelled')->default(false);
            $table->timestamp('created_date')->useCurrent();
            $table->timestamp('publish_date')->nullable();
            $table->timestamp('cancel_date')->nullable();
            $table->timestamp('archive_date')->nullable();
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
