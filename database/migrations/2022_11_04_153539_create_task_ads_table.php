<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('06_task_ads', function (Blueprint $table) {
            $table->id();
            $table->text('title') -> nullable();
            $table->text('img') -> nullable();
            $table->text('vid') -> nullable();
            $table->text('time') -> nullable();
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
        Schema::dropIfExists('task_ads');
    }
}
