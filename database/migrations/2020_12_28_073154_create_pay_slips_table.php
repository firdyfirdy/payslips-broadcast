<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaySlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_slips', function (Blueprint $table) {
            $table->id();
            $table->integer('no_urut');
            
            $table->bigInteger('employee_id')->unsigned();
            $table->index('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');

            $table->dateTime('bulan');
            $table->double('gaji_pokok');
            $table->double('total_lembur');
            $table->double('potongan');
            $table->double('gaji_bersih');
            $table->boolean('is_broadcast')->default(false);

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
        Schema::dropIfExists('pay_slips');
    }
}
