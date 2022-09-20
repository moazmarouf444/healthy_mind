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
        Schema::create('self_assertion_test_questions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('self_assertion_test_id')->index()->unsigned()->nullable();
            $table->foreign('self_assertion_test_id')->references('id')->on('self_assertion_tests')->onDelete('cascade');
            $table->text('question');
            $table->string('always');
            $table->string('mostly');
            $table->string('sometimes');
            $table->string('scarcely');
            $table->string('never');
            $table->string('value_always');
            $table->string('value_mostly');
            $table->string('value_sometimes');
            $table->string('value_scarcely');
            $table->string('value_never');
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
        Schema::dropIfExists('self_assertion_test_questions');
    }
};
