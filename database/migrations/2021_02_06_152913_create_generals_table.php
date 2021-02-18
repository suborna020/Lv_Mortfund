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
            $table->string('website_logo')->nullable();
            $table->string('short_note_1')->nullable();
            $table->string('short_note_2')->nullable();
            $table->string('website_favicon')->nullable();
            $table->string('website_title')->nullable();
            $table->string('base_currency_text')->nullable();
            $table->string('base_currency_symbol')->nullable();
            $table->string('website_email')->nullable();
            $table->string('website_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('copyright')->nullable();
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
