<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->string('loan_type')->nullable();
            $table->string('name')->nullable();
            $table->string('membership_no')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('amount')->nullable();
            $table->text('purpose')->nullable();
            $table->string('repayment_period')->nullable();
            $table->string('current_loan_balance')->nullable();
            $table->string('savings_balance')->nullable();
            $table->string('average_monthly_contribution')->nullable();
            $table->string('repayment_date')->nullable();
            $table->string('thrift_contribution')->nullable();
            $table->string('QLA_repayment')->nullable();
            $table->string('loan_security')->nullable();
            $table->string('loan_security_plus')->nullable();
            $table->string('guarantor_name')->nullable();
            $table->string('guarantor_phone')->nullable();
            $table->string('guarantor_membership_no')->nullable();
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
        Schema::dropIfExists('loans');
    }
}
