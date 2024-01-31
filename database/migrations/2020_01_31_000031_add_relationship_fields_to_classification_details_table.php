<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToClassificationDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('classification_details', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->nullable();

            $table->foreign('category_id', 'category_fk_927423')->references('id')->on('category_incidents');

            $table->unsignedInteger('classification_id')->nullable();

            $table->foreign('classification_id', 'classification_fk_929975')->references('id')->on('classification_incidents');
        });
    }
}
