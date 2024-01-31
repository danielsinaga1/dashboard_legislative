<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassificationDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('classification_details', function (Blueprint $table) {
            $table->increments('id');

            $table->longText('description');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
