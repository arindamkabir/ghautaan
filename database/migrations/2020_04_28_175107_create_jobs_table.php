<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('job_id');
            $table->integer('user_id');
            $table->integer('free_id')->nullable();
            $table->string('job_title', 100);
            $table->string('job_category');
            $table->string('job_address');
            $table->text('job_description');
            $table->integer('job_budget');
            $table->date('job_date');
            $table->string('job_status');		
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
