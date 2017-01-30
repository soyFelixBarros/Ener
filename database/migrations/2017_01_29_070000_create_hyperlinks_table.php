<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHyperlinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hyperlinks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('title');
            $table->string('src');
            $table->string('summary');
            $table->boolean('activated'); // true o false
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
        Schema::dropIfExists('hyperlinks');
    }
}
