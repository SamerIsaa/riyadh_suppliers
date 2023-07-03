<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('ssn_id')->unique();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('mobile_country_code')->nullable();
            $table->string('dial_code')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('mobile')->nullable();

            $table->string('avatar')->default('avatar.png');
            $table->string('password')->nullable();

            $table->string('fcm_token')->nullable();
            $table->string('api_token', 80)->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

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
}
