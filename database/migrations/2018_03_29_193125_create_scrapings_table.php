<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScrapingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrapings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('newspaper_id')->nullable();
            $table->foreign('newspaper_id')->references('id')->on('newspapers')->onDelete('cascade');
            $table->string('title');
            $table->string('src');
            $table->string('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scrapings');
    }
}
