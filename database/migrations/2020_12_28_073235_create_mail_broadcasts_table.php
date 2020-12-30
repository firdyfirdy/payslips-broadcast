<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailBroadcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_broadcasts', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('employee_id')->unsigned();
            $table->index('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');

            $table->string('email');
            $table->boolean('status');
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
        Schema::dropIfExists('mail_broadcasts');
    }
}
