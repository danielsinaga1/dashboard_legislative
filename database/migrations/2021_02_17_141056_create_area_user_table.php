<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_user', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('area_id')->nullable();

            $table->foreign('area_id', 'area_id_fk_924542')->references('id')->on('area_incidents');

            $table->unsignedInteger('user_id')->nullable();

            $table->foreign('user_id', 'user_id_fk_924543')->references('id')->on('users');

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_user');
    }
}
