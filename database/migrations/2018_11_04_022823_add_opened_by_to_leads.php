<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOpenedByToLeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('leads', function (Blueprint $table) {
            $table->integer('opened_by')->nullable();
			//$table->foreign('opened_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('opened_by');
        });
    }
}
