<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('02_user_packages', function (Blueprint $table) {
            $table->id();
            $table->text('package_img') -> nullable();
            $table->text('package_name') -> default('Gold');
            $table->text('minAmount') -> default('00');
            $table->text('maxAmount') -> default('100');
            $table->text('task') -> default('5');
            $table->text('commission') -> default('0.2');
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
        Schema::dropIfExists('user_packages');
    }
}
