<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCommentNonconformitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comment_nonconformitys', function (Blueprint $table) {

            $table->unsignedInteger('result_id')->nullable();

            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');

            $table->unsignedInteger('name_id')->nullable();

            $table->foreign('name_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('nr_id')->nullable();

            $table->foreign('nr_id')->references('id')->on('nonconformity_reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comment_nonconformitys', function (Blueprint $table) {
            //
        });
    }
}
