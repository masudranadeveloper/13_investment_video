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
        Schema::create('01_user_account', function (Blueprint $table) {
            $table->id();
            // acc data
            $table->text('fName') -> default('fName');
            $table->text('lName') -> default('lName');
            $table->text('userName') -> default('userName');
            $table->text('mobileNumber') -> default('mobileNumber');
            $table->text('email') -> default('email');
            $table->text('password') -> default('password');
            $table->text('csrf') -> default('csrf');
            // account details
            $table->text('picture') -> default('userpicture.png');
            $table->text('totalAmount') -> default('00');
            $table->text('todaysAmount') -> default('00');
            $table->text('task') -> default('00');
            $table->text('package_name') -> nullable();
            $table->text('refreshDay') -> default('00');
            $table->text('nextWithdraw') -> default('00');
            // gen
            $table->text('invite') -> nullable();
            $table->text('gen1st') -> nullable();
            $table->text('gen2nd') -> nullable();
            $table->text('gen3rd') -> nullable();
            $table->text('gen4th') -> nullable();
            $table->text('gen5th') -> nullable();
            // st
            $table->text('accSt') -> default('active');
            $table->text('pakageName')-> nullable();
            $table->text('online_time') -> default('00');
            // total
            $table->text('totalDeposit') -> default('00');
            $table->text('totalWithdraw') -> default('00');
            $table->text('totalRechargeCommission') -> default('00');
            $table->text('totalGenCommission') -> default('00');
            // addresh
            $table->text('street') -> default('unknown');
            $table->text('city') -> default('CANADA');
            $table->text('state') -> default('unknown');
            $table->text('postcode') -> default('unknown');
            $table->text('country') -> default('USA');
            // income
            $table->text('todayIncome') -> default('00');
            $table->text('easterdayIncome') -> default('00');
            $table->text('todayRaferIncome') -> default('00');
            $table->text('todaysRechargeIncome') -> default('00');

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
