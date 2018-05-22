<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $statement = 'create table ads (
            id serial primary key,
            title varchar(50) not null,
            price integer not null check (price > 0),
            description text not null,
            category_id integer not null check (category_id > 0),
            city varchar(50) not null,
            user_id integer not null check (user_id > 0),
            address varchar(50),
            phone varchar(12) not null,
            views integer default 0 check (views > 0) ,
            visitors integer default 0 check (visitors > 0),
            images varchar(500) array[10],
            archived boolean default false,
            published boolean default false,
            cancelled boolean,
            create_date timestamp not null default now(),
            publish_date timestamp,
            cancel_date timestamp,
            archive_date timestamp
        )';

        DB::statement($statement);
        DB::statement('create unique index category_id_index on ads (category_id)');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement('drop table if exists ads');
    }
}
