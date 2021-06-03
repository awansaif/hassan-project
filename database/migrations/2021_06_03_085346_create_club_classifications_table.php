<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubClassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_classifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->constraind('clubs')->onDelete('Cascade');
            $table->string('name');
            $table->string('citta');
            $table->string('regione');
            $table->string('serie_a');
            $table->string('serie_b');
            $table->string('serie_c');
            $table->string('volo');
            $table->string('trad');
            $table->string('ball');
            $table->string('italia');
            $table->string('champian_cup');
            $table->string('trofee');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_classifications');
    }
}
