<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->string('bod');
            $table->string('telephone');
            $table->string('email');
            $table->string('address');
            $table->integer('role_id');
            $table->double('salary');
            $table->integer('store_id');
            $table->string('image');
            $table->string('cv');
            $table->string('status');
            $table->string('department'); 
            $table->string('description');            
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
        Schema::dropIfExists('employees');
    }
}
