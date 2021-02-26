<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('team_one_image');
            $table->string('team_one_name');
            $table->string('team_two_image');
            $table->string('team_two_name');
            $table->string('current_set_score',40)->default('0-0');
            $table->string('match_start_time')->nullable();
            $table->string('match_end_time')->nullable();
            $table->string('set_won_by_team_one',20)->default(0);
            $table->string('set_won_by_team_two',20)->default(0);
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
        Schema::dropIfExists('teams');
    }
}
