<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('battle_id')->nullable()->default(null);
            $table->string('name');
            $table->unsignedInteger('max_people');
            $table->timestamps();

            $table->foreign('battle_id')->references('id')->on('battles')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forces');
    }
}
