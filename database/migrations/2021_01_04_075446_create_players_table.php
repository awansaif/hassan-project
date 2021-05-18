<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('created_by', 50)->default(1);
            $table->foreignId('country_id')->constrained('countries')->onDelete('Cascade');;
            $table->string('player_name');
            $table->string('player_picture');
            $table->string('player_role');
            $table->string('sponser_image_one');
            $table->string('sponser_image_two');
            $table->string('club_name');
            $table->string('club_image');
            $table->string('player_favorite_shot');
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
        Schema::dropIfExists('players');
    }
}
