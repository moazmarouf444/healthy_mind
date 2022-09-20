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
        Schema::create('dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->index()->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->enum('saturday',['enable','disable'])->nullable();
            $table->time('saturday_from')->nullable();
            $table->time('saturday_to')->nullable();

            $table->enum('sunday',['enable','disable'])->nullable();
            $table->time('sunday_from')->nullable();
            $table->time('sunday_to')->nullable();

            $table->enum('monday',['enable','disable'])->nullable();
            $table->time('monday_from')->nullable();
            $table->time('monday_to')->nullable();

            $table->enum('tuesday',['enable','disable'])->nullable();
            $table->time('tuesday_from')->nullable();
            $table->time('tuesday_to')->nullable();

            $table->enum('wednesday',['enable','disable'])->nullable();
            $table->time('wednesday_from')->nullable();
            $table->time('wednesday_to')->nullable();

            $table->enum('thursday',['enable','disable'])->nullable();
            $table->time('thursday_from')->nullable();
            $table->time('thursday_to')->nullable();

            $table->enum('friday',['enable','disable'])->nullable();
            $table->time('friday_from')->nullable();
            $table->time('friday_to')->nullable();

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
        Schema::dropIfExists('dates');
    }
};
