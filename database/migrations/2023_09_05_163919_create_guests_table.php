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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('guest_status', 20);
            $table->string('guest_name', 50);
            $table->string('guest_email', 50);
            $table->string('guest_phone_no', 20);
            $table->string('guest_side', 20);
            $table->unsignedBigInteger('cust_id');
            $table->foreign('cust_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest');
    }
};
