<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipFieldsToDistributionIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('distribution_incidents', function (Blueprint $table) {
        $table->unsignedInteger('result_id')->nullable();

        $table->foreign('result_id', 'result_fk_917384')->references('id')->on('results');  

        $table->unsignedInteger('name_id')->nullable();

        $table->foreign('name_id', 'name_fk_942513')->references('id')->on('users');

        $table->unsignedInteger('ir_id')->nullable();
        
        $table->foreign('ir_id', 'ir_fk_961925')->references('id')->on('incident_reports');
        });
    }
}
