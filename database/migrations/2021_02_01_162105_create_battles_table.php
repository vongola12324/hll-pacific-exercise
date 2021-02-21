<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBattlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('map_id')->nullable()->default(null);
            $table->string('name');
            $table->tinyInteger('mode');
            $table->timestamp('meeting_at')->nullable();
            $table->timestamp('match_at')->nullable();
            $table->unsignedInteger('max_people');
            $table->timestamps();

            $table->foreign('map_id')->references('id')->on('maps')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('battles');
    }
}
