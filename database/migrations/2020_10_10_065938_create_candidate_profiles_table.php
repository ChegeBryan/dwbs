<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('candidate_id');
            $table->string('category'); // Shamba boy / House help
            $table->string('type'); // fulltime/parttime
            $table->double('salary', 10, 2);
            $table->string('county');
            $table->string('town');
            $table->boolean('status')->default(0); // 0 - Open for Work / 1 - Not open for work
            $table->timestamps();
            $table->foreign('candidate_id')
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
        Schema::dropIfExists('candidate_profiles');
    }
}
