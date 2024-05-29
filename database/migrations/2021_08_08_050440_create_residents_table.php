<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('res_num')->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('suffix_name')->nullable();

            $table->string('gender');
            $table->date('birthday');
            $table->string('birthplace')->nullable();
            $table->string('civil_status');
            $table->string('pwd');

            $table->string('house_number')->nullable();
            $table->string('street')->nullable();

            $table->string('occupation');
            $table->string('student');//educational attainment

            $table->string('spouse_fname')->nullable();
            $table->string('spouse_mname')->nullable();
            $table->string('spouse_lname')->nullable();
            $table->string('spouse_sname')->nullable();
            $table->string('spouse_occupation')->nullable();
            
            $table->string('type_of_house');
            $table->string('membership_prog');
            // next time mga to hahahaha
            // $table->string('residency_length');
            // $table->boolean('indigent')->default(false);
            // $table->boolean('water')->default(true);
            // $table->boolean('electricity')->default(true);

            $table->string('image')->nullable();

            $table->unsignedBigInteger('barangay_id');
            $table->unsignedBigInteger('purok_id')->nullable();
            $table->foreign('barangay_id')->references('id')->on('barangays')->onDelete('cascade');
            $table->foreign('purok_id')->references('id')->on('puroks')->onDelete('cascade');
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
        Schema::dropIfExists('residents');
    }
}
