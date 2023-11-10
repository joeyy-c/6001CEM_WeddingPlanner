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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name', 70);
            // $table->string('project_details', 500);
            $table->json('project_details')->default('{}');
            $table->string('project_status', 50);
            $table->date('wedding_date')->nullable();
            $table->unsignedBigInteger('cust_id');
            $table->foreign('cust_id')->references('id')->on('users');
            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
