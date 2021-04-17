<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignupLoginViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signup_login_views', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login_title')->nullable();
            $table->string('login_text')->nullable();
            $table->string('signup_title')->nullable();
            $table->string('signup_text')->nullable();
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
        Schema::dropIfExists('signup_login_views');
    }
}
