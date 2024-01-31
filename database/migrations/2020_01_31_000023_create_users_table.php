<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('email')->nullable()->unique();

            $table->datetime('email_verified_at')->nullable();

            $table->string('password')->nullable();

            $table->string('remember_token')->nullable();

            $table->string('npk')->nullable()->unique();

            $table->unsignedInteger('parent_id')->nullable();

            $table->foreign('parent_id', 'parent_fk_950165')->references('id')->on('users');

            $table->unsignedInteger('job_id')->nullable();

            $table->foreign('job_id', 'job_fk_927461')->references('id')->on('job_titles');

            $table->unsignedInteger('dept_id')->nullable();

            $table->foreign('dept_id', 'dept_fk_930199')->references('id')->on('origin_departments');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
