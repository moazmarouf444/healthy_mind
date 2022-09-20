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
        Schema::create('social_phobia_test_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('social_phobia_id')->index()->unsigned()->nullable();
            $table->foreign('social_phobia_id')->references('id')->on('social_phobia_tests')->onDelete('cascade');
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
        Schema::dropIfExists('social_phobia_test_questions');
    }
};
