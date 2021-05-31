<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocaAndDescColumnInClubDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('club_details', function (Blueprint $table) {
            $table->mediumText('location')->after('name');
            $table->text('description')->after('location');
            $table->text('table_chara')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('club_details', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->dropColumn('description');
            $table->dropColumn('table_chara');
        });
    }
}
