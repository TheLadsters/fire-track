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
        Schema::create('hydrant', function (Blueprint $table) {
            $table->id('hydrant_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('hydrant_type_id');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('address');
            $table->enum('status', ['working', 'not working', 'maintenance'])->default('working');
            $table->string('img_url');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('hydrant_type_id')->references('hydrant_type_id')->on('hydrant_type');
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
        Schema::dropIfExists('hydrant');
    }
};
