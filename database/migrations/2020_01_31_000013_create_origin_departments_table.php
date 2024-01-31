<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOriginDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('origin_departments', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
