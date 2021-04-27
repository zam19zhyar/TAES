<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('evaluation_questions', function (Blueprint $table) {
            $table->id();
            $table->longText('question_text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluation_questions');
    }
}
