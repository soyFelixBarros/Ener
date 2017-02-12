<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('newspaper_id')->nullable();
            $table->unsignedInteger('scraping_id')->nullable();
            $table->string('url', 255);
            $table->boolean('active')->default(true); // true o false
            $table->timestamps();
            $table->foreign('newspaper_id')->references('id')->on('newspapers');
            $table->foreign('scraping_id')->references('id')->on('scrapings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
