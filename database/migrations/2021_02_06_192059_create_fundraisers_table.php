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
            $table->increments('id');
            $table->string('category_id')->nullable();
            $table->string('member_id')->nullable();
            $table->string('location')->nullable();
            $table->string('title')->nullable();
            $table->string('icon')->nullable();
            $table->string('benificiary_name')->nullable();
            $table->string('needed_amount')->nullable();
            $table->string('raised')->nullable();
            $table->string('deadline')->nullable();
            $table->longText('story')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('photo')->nullable();
            $table->string('video')->nullable();
            $table->string('proof_document')->nullable();
            $table->string('status')->nullable();
            $table->integer('private')->default(0);
            $table->integer('recent')->default(0);
            $table->integer('featured')->nullable();
            $table->integer('project_support')->default(0);
            $table->integer('comments_count')->nullable();
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
