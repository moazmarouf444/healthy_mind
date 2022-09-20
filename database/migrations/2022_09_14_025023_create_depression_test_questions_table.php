<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depression_test_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('depression_test_id')->index()->unsigned()->nullable();
            $table->foreign('depression_test_id')->references('id')->on('depression_tests')->onDelete('cascade');
            $table->string('question');
            $table->text('answer_zero');
            $table->text('answer_one');
            $table->text('answer_two');
            $table->text('answer_three');

            $table->string('value_answer_zero')->default(0);
            $table->string('value_answer_one')->default(1);
            $table->string('value_answer_two')->default(2);
            $table->string('value_answer_three')->default(3);

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
        Schema::dropIfExists('depression_test_questions');
    }
};
