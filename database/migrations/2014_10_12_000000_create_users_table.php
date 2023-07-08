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
            $table->string('name');
            $table->string('email')->unique()->nullable();

            $table->string('order_owner_country_code');
            $table->string('order_owner_dial_code');
            $table->string('order_owner_mobile_number');
            $table->string('order_owner_mobile');

            $table->string('address');
            $table->string('password');

            $table->string('company_name');
            $table->string('owner_name');

            $table->string('mobile_country_code');
            $table->string('dial_code');
            $table->string('mobile_number');
            $table->string('mobile');

            $table->string('commercial_registration_no');
            $table->string('tax_no');

            $table->boolean('is_active')->default(true);

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
