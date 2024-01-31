<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_reports', function (Blueprint $table) {
            $table->increments('id');

            $table->string('no_laporan')->nullable();   

            $table->string('perbaikan_awal')->nullable();

            $table->string('location')->nullable();

            $table->string('perbaikan')->nullable();

            $table->string('pencegahan')->nullable();

            $table->text('description');

            $table->string('reason')->nullable();

            $table->string('status')->nullable();

            $table->datetime('date_incident')->nullable();

            $table->datetime('date_action')->nullable();

            $table->dateTime('assigned_at')->nullable();

            $table->datetime('reviewed_at')->nullable();

            $table->datetime('acknowledged_at')->nullable();

            $table->dateTime('done_at')->nullable();
            
            $table->integer('direct_cost')->nullable();
            // $table->float('copq', 8, 2)->nullable();
            
            $table->decimal('copq', 8, 2)->nullable();

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
        Schema::dropIfExists('incident_reports');
    }
}
