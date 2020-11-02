<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employer_id');
            $table->string('category');
            $table->string('title'); // job title
            $table->string('type'); // fulltime/parttime
            $table->double('salary', 10, 2);
            $table->text('description');
            $table->string('county');
            $table->string('town');
            $table->text('address');
            $table->boolean('status')->default(0); // 0 - Open, 1 - Filled
            $table->timestamps();
            $table->foreign('employer_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
