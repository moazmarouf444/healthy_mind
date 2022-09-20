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
        Schema::create('taylor_for_anxiety_test_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('taylor_id')->index()->unsigned()->nullable();
            $table->foreign('taylor_id')->references('id')->on('taylor_for_anxiety_tests')->onDelete('cascade');
            $table->text('question');
            $table->string('yes');
            $table->string('no');
            $table->string('value_yes');
            $table->string('value_no');

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
        Schema::dropIfExists('taylor_for_anxiety_test_questions');
    }
};
