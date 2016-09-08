<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('path');
            $table->string('thumbnail_path')->nullable();
            $table->string('display_name');
            $table->integer('gallery_id')->unsigned()->index();
//            $table->foreign('gallery_id')->nullable()->references('id')->on('galleries')->onDelete('cascade');
            $table->integer('type')->default('1'); // 1 image, 2 link;
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
        Schema::drop('files');
    }
}
