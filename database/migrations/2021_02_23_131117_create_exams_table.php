<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('exam_id');
            $table->string('subject');
            $table->string('class');
            $table->string('teacher');
            $table->string('term');
            $table->string('session');
            $table->string('exam_minutes');
            $table->string('warn_minutes');
            $table->string('num_questions');
            $table->string('exam_status');
            $table->string('show_result');
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
        Schema::dropIfExists('exams');
    }
}
