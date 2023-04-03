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
        Schema::create('bulletin', function (Blueprint $table) {
            $table->id('bulletin_id');
            $table->unsignedBigInteger('user_id');
            $table->string('author_name')->default('admin');
            $table->string('title');
            $table->mediumText('summary');
            $table->string('article_url');
            $table->string('img_url');
            $table->foreign('user_id')->references('user_id')->on('users');
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
        Schema::dropIfExists('bulletin');
    }
};
