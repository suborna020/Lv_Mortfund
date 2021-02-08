<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_views', function (Blueprint $table) {
            $table->id();
            $table->string('contact_title');
            $table->string('contact_text');
            $table->string('contact_email');
            $table->string('contact_number');
            $table->string('contact_hours');
            $table->string('contact_location');
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
        Schema::dropIfExists('contact_views');
    }
}
