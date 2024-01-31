<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigation_details', function (Blueprint $table) {
            $table->increments('id');

            $table->string('recommendation')->nullable();

            $table->datetime('date_deadline')->nullable();

            $table->datetime('date_actual')->nullable();

            $table->string('status')->nullable();

            $table->unsignedInteger('pic_id')->nullable();

            $table->foreign('pic_id', 'pic_id_fk_914842')->references('id')->on('users');

            $table->unsignedInteger('precortive_id')->nullable();

            $table->foreign('precortive_id', 'precortive_id_fk_975149')->references('id')->on('precortives');

            $table->unsignedInteger('incident_report_id')->nullable();

            $table->foreign('incident_report_id', 'incident_report_id_fk_951023')->references('id')->on('incident_reports');

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
        Schema::dropIfExists('investigation_details');
    }
}
