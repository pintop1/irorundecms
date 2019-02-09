<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('other_names')->nullable();
            $table->string('email')->nullable();
            $table->string('membership_no')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('Qla_dets')->nullable();
            $table->string('purpose')->nullable();
            $table->string('asset_type')->nullable();
            $table->string('size')->nullable();
            $table->string('brand')->nullable();
            $table->string('description')->nullable();
            $table->string('tenure_of_payment')->nullable();
            $table->string('salary_account_no')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->string('signature')->nullable();
            $table->string('guarantor_name')->nullable();
            $table->string('guarantor_phone')->nullable();
            $table->string('guarantor_memership_no')->nullable();
            $table->string('guarantor_email')->nullable();
            $table->string('status')->nullable();
            $table->string('approval_status')->default('pending');
            $table->datetime('date_approved')->nullable();
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
        Schema::dropIfExists('asset');
    }
}
