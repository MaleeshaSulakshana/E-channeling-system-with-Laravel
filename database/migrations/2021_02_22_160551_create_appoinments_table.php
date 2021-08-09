<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppoinmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoinments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doctor_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('appointmentNumber')->unique();
            $table->date('appointmentDate');
            $table->string('scheduledTime');
            $table->string('appointmentDuration')->nullable();
            $table->boolean('isCurrentlyActive');
            $table->string('isbooked');
            $table->boolean('isCancelled');
            $table->foreign('doctor_id')
                ->references('id')->on('doctors')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('appoinments');
    }
}
