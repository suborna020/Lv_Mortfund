<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundraisersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fundraisers', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('member_id');
            $table->string('location');
            $table->string('title');
            $table->string('benificiary_name');
            $table->string('needed_amount');
            $table->string('deadline');
            $table->string('story');
            $table->string('thumbnail');
            $table->string('photo');
            $table->string('video');
            $table->string('proof_document');
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
        Schema::dropIfExists('fundraisers');
    }
}
