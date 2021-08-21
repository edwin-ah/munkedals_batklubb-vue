<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRowsToInformationSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('information_sheets', function (Blueprint $table) {
            $table->string('title', 100);
            $table->string('pdfName', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('information_sheets', function (Blueprint $table) {
            $table->dropColumn('title', 100);
            $table->dropColumn('pdfName', 100);
        });
    }
}
