<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('method')->nullable();
            $table->string('method_currency')->nullable();
            $table->string('rate')->nullable();
            $table->string('min_limit')->nullable();
            $table->string('max_limit')->nullable();
            $table->string('charge')->nullable();
            $table->string('processing_time')->nullable();
            $table->string('instruction_for_user')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('withdraw_methods');
    }
}
