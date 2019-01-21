<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->increments('id');

            $table->date('date');	
            $table->time('from');	
            $table->time('to');	
            $table->text('comments');	
            $table->date('submitted');	

            $table->unsignedInteger('employee_id'); 
            $table->foreign('employee_id')->references('id')->on('users');

            $table->unsignedInteger('activity_id'); 
            $table->foreign('activity_id')->references('id')->on('activities');

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
        Schema::dropIfExists('timesheets');
    }
}
