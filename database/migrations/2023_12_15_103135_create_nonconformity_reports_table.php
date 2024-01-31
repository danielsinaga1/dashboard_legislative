<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonconformityReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nonconformity_reports', function (Blueprint $table) {
            $table->id();

            $table->string('no_laporan')->nullable();

            $table->datetime('date_action')->nullable();

            $table->datetime('date_event')->nullable();

            $table->datetime('assigned_at')->nullable();

            $table->datetime('acknowledged_at')->nullable();

            $table->datetime('done_at')->nullable();

            $table->string('corrective')->nullable();

            $table->string('preventive')->nullable();

            $table->text('description')->nullable();

            $table->string('reason')->nullable();

            $table->string('reason2')->nullable();

            $table->string('status')->nullable();

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
        Schema::dropIfExists('nonconformity_reports');
    }
}
