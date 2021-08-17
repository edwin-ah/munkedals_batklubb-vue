<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayClosedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holiday_closeds', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->year('year');
            $table->unsignedTinyInteger('startWeek');
            $table->unsignedTinyInteger('endWeek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holiday_closeds');
    }
}
