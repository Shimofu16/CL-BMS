<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officials', function (Blueprint $table) {

            $table->id();

            $table->string('name', 32);
            $table->string('position', 32);
            $table->string('role', 64)->nullable();
            $table->string('path')->nullable();
            $table->string('img', 64)->nullable();
            $table->string('year');
            $table->unsignedBigInteger('barangay_id');
            $table->foreign('barangay_id')->references('id')->on('barangays')->onDelete('cascade');
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
        Schema::dropIfExists('officials');
    }
}
