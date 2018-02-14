<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScrapersTable extends Migration
{
    protected $table;

    public function __construct()
    {
        $this->table = (new App\Scraper())->getTable();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('newspaper_id')->nullable();
            $table->foreign('newspaper_id')->references('id')->on('newspapers')->onDelete('cascade');
            $table->string('href');
            $table->string('title');
            $table->string('src');
            $table->string('content');
            $table->integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
