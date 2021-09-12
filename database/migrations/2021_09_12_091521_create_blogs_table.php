<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->integerIncrements('blogId');
            $table->string('blogTitle');
            $table->string('blogSlug');
            $table->longText('blogContent');
            $table->string('blogImage');
            $table->integer('blogView');
            $table->timestamp('blogDate');
            $table->integer('blogUser');
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
        Schema::dropIfExists('blogs');
    }
}
