<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNonconformityReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nonconformity_reports', function (Blueprint $table) {

            $table->unsignedInteger('nama_pelapor_id')->nullable();

            $table->foreign('nama_pelapor_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('dept_origin_id')->nullable();

            $table->foreign('dept_origin_id')->references('id')->on('origin_departments')->onDelete('cascade');

            $table->unsignedInteger('root_cause_id')->nullable();

            $table->foreign('root_cause_id')->references('id')->on('root_causes')->onDelete('cascade');

            $table->unsignedInteger('dept_designated_id')->nullable();

            $table->foreign('dept_designated_id')->references('id')->on('designation_departments')->onDelete('cascade');

            $table->unsignedInteger('result_id')->nullable();

            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');

            $table->unsignedInteger('acknowledged_by_id')->nullable();

            $table->foreign('acknowledged_by_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('action_by_id')->nullable();

            $table->foreign('action_by_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('assigned_to_id')->nullable();

            $table->foreign('assigned_to_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('area_id')->nullable();

            $table->foreign('area_id')->references('id')->on('area_incidents')->onDelete('cascade');

            $table->unsignedBigInteger('location_ncr_id')->nullable();

            $table->foreign('location_ncr_id')->references('id')->on('locations')->onDelete('cascade');

            $table->unsignedBigInteger('region_id')->nullable();

            $table->foreign('region_id')->references('id')->on('region_ncrs')->onDelete('cascade');

            $table->unsignedBigInteger('entity_id')->nullable();

            $table->foreign('entity_id')->references('id')->on('entitys')->onDelete('cascade');

            $table->unsignedBigInteger('non_plant_location_id')->nullable();

            $table->foreign('non_plant_location_id')->references('id')->on('nonplant_locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nonconformity_reports', function (Blueprint $table) {
            //
        });
    }
}
