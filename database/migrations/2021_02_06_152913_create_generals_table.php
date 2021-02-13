<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('website_logo');
            $table->string('short_note_1');
            $table->string('short_note_2');
            $table->string('website_favicon');
            $table->string('website_title');
            $table->string('base_currency_text');
            $table->string('base_currency_symbol');
            $table->string('website_email');
            $table->string('website_phone');
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
        Schema::dropIfExists('generals');
    }
}
