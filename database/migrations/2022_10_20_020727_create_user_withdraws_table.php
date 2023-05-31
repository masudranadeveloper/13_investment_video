<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('04_user_withdraws', function (Blueprint $table) {
            $table->id();
            $table->text('amount');
            $table->text('userID');
            $table->text('OrderID');
            $table->text('Method');
            $table->text('Address');
            $table->text('Tax');
            $table->text('st');
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
        Schema::dropIfExists('user_withdraws');
    }
}
