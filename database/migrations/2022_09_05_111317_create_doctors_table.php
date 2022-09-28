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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('country_code',5)->default('966');
            $table->string('phone',15)->unique();
            $table->string('email',50)->unique();
            $table->text('biography');
            $table->string('address');
            $table->string('password',100);
            $table->string('image', 50)->default('default.png');
            $table->string('logo', 50)->default('default.png');
            $table->string('lighted', 50)->default('default.png');
            $table->boolean('active')->default(1);
            $table->boolean('is_blocked')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->string('lang', 2)->default('ar');
            $table->boolean('is_notify')->default(true);
            $table->string('code', 10)->nullable();
            $table->decimal('wallet_balance', 9,2)->default(0);
            $table->enum('specialization', ['doctor','specialist']);
            $table->string('profit_ratio')->default(0);
            $table->decimal('session_price', 9,2)->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('doctors');
    }
};
