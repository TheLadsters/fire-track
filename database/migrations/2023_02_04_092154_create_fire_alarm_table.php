<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('fire_alarm', function (Blueprint $table) {
            $table->id('firealarm_id');
            $table->unsignedBigInteger('user_id');
            $table->string('fire_location');
            $table->string('longitude');
            $table->string('latitude');
            $table->enum('status', ['First Alarm', 'Second Alarm','Third Alarm','Fourth Alarm',
                                    'Fifth Alarm','Task Force Alpha','Task Force Bravo','Task Force Charlie',
                                    "Task Force Delta, Echo, Hotel, India", 'General Alarm','Under Control', 'Fire Out'])->default('First Alarm');
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
        Schema::dropIfExists('fire_alarm');
    }
};
