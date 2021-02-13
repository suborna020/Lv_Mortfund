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
            $table->string('icon');
            $table->string('benificiary_name');
            $table->string('needed_amount');
            $table->string('raised');
            $table->string('deadline');
            $table->longText('story');
            $table->string('thumbnail');
            $table->string('photo');
            $table->string('video');
            $table->string('proof_document');
            $table->integer('recent')->default(0);
            $table->integer('project_support')->default(0);
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
