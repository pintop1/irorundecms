<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNextOfKinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_of_kin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('other_names')->nullable();
            $table->string('membership_no')->nullable();
            $table->string('year_of_admission')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('signature')->nullable();
            $table->timestamp('date_signed');
            $table->string('next_first_name')->nullable();
            $table->string('next_last_name')->nullable();
            $table->string('next_other_names')->nullable();
            $table->string('next_phone')->nullable();
            $table->string('next_relationship')->nullable();
            $table->string('next_sex')->nullable();
            $table->string('next_percentage_of_benefit')->nullable();
            $table->string('next_passport')->nullable();
            $table->string('next_address')->nullable();
            $table->string('next_two_first_name')->nullable();
            $table->string('next_two_last_name')->nullable();
            $table->string('next_two_other_names')->nullable();
            $table->string('next_two_phone')->nullable();
            $table->string('next_two_relationship')->nullable();
            $table->string('next_two_sex')->nullable();
            $table->string('next_two_percentage_of_benefit')->nullable();
            $table->string('next_two_passport')->nullable();
            $table->string('next_two_address')->nullable();
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
        Schema::dropIfExists('next_of_kin');
    }
}
