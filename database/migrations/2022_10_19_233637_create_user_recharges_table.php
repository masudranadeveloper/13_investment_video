<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRechargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('03_user_recharges', function (Blueprint $table) {
            $table->id();
            $table->text('img');
            $table->text('amount');
            $table->text('userID');
            $table->text('orderID');
            $table->text('method');
            $table->text('tranx');
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
        Schema::dropIfExists('user_recharges');
    }
}
