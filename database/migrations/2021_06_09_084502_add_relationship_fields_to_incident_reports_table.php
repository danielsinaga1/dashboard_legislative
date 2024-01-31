<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipFieldsToIncidentReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incident_reports', function (Blueprint $table) {
            $table->unsignedInteger('nama_pelapor_id')->nullable();

            $table->foreign('nama_pelapor_id', 'nama_pelapor_fk_927464')->references('id')->on('users');

            $table->unsignedInteger('reviewed_by_id')->nullable();

            $table->foreign('reviewed_by_id', 'reviewed_by_fk_927474')->references('id')->on('users');

            $table->unsignedInteger('dept_origin_id')->nullable();

            $table->foreign('dept_origin_id', 'dept_origin_fk_927478')->references('id')->on('origin_departments');

            $table->unsignedInteger('root_caus_eid');

            $table->foreign('root_cause_id', 'root_cause_fk_927479')->references('id')->on('root_causes');

            $table->unsignedInteger('category_id')->nullable();

            $table->foreign('category_id', 'category_fk_927480')->references('id')->on('category_incidents');

            $table->unsignedInteger('classify_id')->nullable();

            $table->foreign('classify_id', 'classify_fk_927481')->references('id')->on('classification_incidents');

            $table->unsignedInteger('dept_designated_id')->nullable();

            $table->foreign('dept_designated_id', 'dept_designated_fk_927482')->references('id')->on('designation_departments');

            $table->unsignedInteger('result_id')->nullable();

            $table->foreign('result_id', 'result_fk_927483')->references('id')->on('results');

            $table->unsignedInteger('acknowledged_by_id')->nullable();

            $table->foreign('acknowledged_by_id', 'acknowledged_by_fk_927484')->references('id')->on('users');

            $table->unsignedInteger('action_by_id')->nullable();

            $table->foreign('action_by_id', 'action_by_fk_944425')->references('id')->on('users');

            $table->unsignedInteger('assigned_to_id')->nullable();

            $table->foreign('assigned_to_id', 'assigned_to_fk_944425')->references('id')->on('users');

            $table->unsignedInteger('cr_id')->nullable();

            $table->foreign('cr_id', 'cr_fk_942862')->references('id')->on('chemical_releases');

            $table->unsignedInteger('area_id')->nullable();

            $table->foreign('area_id', 'area_fk_963580')->references('id')->on('area_incidents');

            $table->unsignedInteger('ri_id')->nullable();

            $table->foreign('ri_id', 'ri_fk_914570')->references('id')->on('region_incidents');
        });
    }
}
