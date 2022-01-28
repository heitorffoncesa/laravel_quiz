<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_id');
            $table->uuid('uuid');
            $table->string('title');
            $table->text('answers');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table){
            $table->dropForeign(['category_id', 'user_id']);
        });

        Schema::dropIfExists('questions');
    }
}
