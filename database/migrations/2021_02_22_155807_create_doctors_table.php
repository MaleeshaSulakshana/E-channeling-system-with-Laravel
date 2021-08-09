<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('department_id')->unsigned();
            $table->string('doctorName');
            $table->string('registrationNo');
            $table->string('educationalDegrees');
            $table->string('roomNumber')->unique();
            $table->string('visitFee');
            $table->boolean('isActiveForScheduling')->nullable()->default('1');
            $table->boolean('isRoomCurrentlyOpen')->nullable();
            $table->string('isAvaliableOn')->default('Weekdays');
            $table->string('isAvaliableFrom')->default('6');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('department_id')
                ->references('id')->on('departments')
                ->onDelete('cascade');
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
        Schema::dropIfExists('doctors');
    }
}
