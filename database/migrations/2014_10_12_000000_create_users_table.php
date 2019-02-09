<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('other_names')->nullable();
            $table->string('title')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('whatsapp_no')->nullable();
            $table->string('passport')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('address')->nullable();
            $table->string('name_of_company')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_reg_no')->nullable();
            $table->string('position')->nullable();
            $table->string('nature')->nullable();
            $table->string('industry')->nullable();
            $table->string('guarantor_name')->nullable();
            $table->string('guarantor_service_no')->nullable();
            $table->string('rank')->nullable();
            $table->string('station')->nullable();
            $table->string('command')->nullable();
            $table->string('unit')->nullable();
            $table->string('irorun_m_no')->nullable();
            $table->string('recom_slot_no')->nullable();
            $table->string('guarantor_phone')->nullable();
            $table->string('guarantor_email')->nullable();
            $table->string('guarantor_address')->nullable();
            $table->string('application_fee')->nullable();
            $table->string('application_status')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('treasurer_sign')->nullable();
            $table->string('form_checked_by')->nullable();
            $table->string('checked_by_signature')->nullable();
            $table->string('date_checked')->nullable();
            $table->string('form_approved_by')->nullable();
            $table->string('approved_signature')->nullable();
            $table->string('date_approved')->nullable();
            $table->string('user_signature')->nullable();
            $table->string('status')->nullable();
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
}
