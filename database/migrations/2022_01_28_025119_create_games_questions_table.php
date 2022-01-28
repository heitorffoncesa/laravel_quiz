<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_questions', function (Blueprint $table) {
            $table->unsignedInteger('game_id');
            $table->unsignedInteger('question_id');
            $table->boolean('is_answered')->default(false);

            $table->foreign('game_id')
                ->references('id')
                ->on('games');

            $table->foreign('question_id')
                ->references('id')
                ->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games_questions', function (Blueprint $table){
            $table->dropForeign(['game_id', 'question_id']);
        });

        Schema::dropIfExists('games_questions');
    }
}
