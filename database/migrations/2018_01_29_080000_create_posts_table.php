<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    protected $table;

    public function __construct()
    {
        $this->table = (new App\Post())->getTable();
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
            $table->unsignedInteger('story_id')->nullable();
            $table->foreign('story_id')->references('id')->on('stories');
            $table->unsignedInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('posts');
            $table->unsignedInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedInteger('province_id')->nullable();
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->unsignedInteger('newspaper_id')->nullable();
            $table->foreign('newspaper_id')->references('id')->on('newspapers');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('title');
            $table->text('summary')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('url_hash', 32)->nullable()->unique();
            $table->string('status', 20)->default('publish');
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
        Schema::dropIfExists($this->table);
    }
}
