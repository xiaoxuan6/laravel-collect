<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config("collect.collect_table"), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger(config("collect.user_foreign_key"))->index()->comment('user_id');
            $table->morphs("collectable");
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
        Schema::dropIfExists(config("collect.collect_table"));
    }
}
