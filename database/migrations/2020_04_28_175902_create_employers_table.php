<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->bigIncrements('emp_id');
            $table->integer('user_id');            
            $table->integer('wallet')->default(0);
            $table->date('dob');	
            $table->string('address');	
            $table->string('city');	
            $table->string('state');	
            $table->string('zip');	
            $table->string('pro_pic_name')->nullable();	
            $table->string('pro_pic_path')->nullable();
            $table->boolean('profile_completed')->default(0);
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
        Schema::dropIfExists('employers');
    }
}
