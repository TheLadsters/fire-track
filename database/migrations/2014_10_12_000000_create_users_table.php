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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('email')->unique();
            $table->string('fname');
            $table->string('lname');
            $table->string('contact_no');
            $table->string('password');
            $table->string('birthday');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('address');
            $table->string('img_url')->nullable()->default(NULL);
            $table->enum('role', ['firefighter', 'admin'])->default('admin');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
