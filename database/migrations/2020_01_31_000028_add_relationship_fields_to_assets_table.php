<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssetsTable extends Migration
{
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->nullable();

            $table->foreign('category_id', 'category_fk_944481')->references('id')->on('asset_categories');

            $table->unsignedInteger('status_id')->nullable();

            $table->foreign('status_id', 'status_fk_944485')->references('id')->on('asset_statuses');

            $table->unsignedInteger('location_id')->nullable();

            $table->foreign('location_id', 'location_fk_944486')->references('id')->on('asset_locations');

            $table->unsignedInteger('assigned_to_id')->nullable();

            $table->foreign('assigned_to_id', 'assigned_to_fk_944488')->references('id')->on('users');
        });
    }
}
