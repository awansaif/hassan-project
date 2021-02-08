<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCassificheDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cassifiche_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cassifiche_id')->constrained('cassifiches')->onDelete('Cascade');
            $table->string('name');
            $table->string('image');
            $table->string('player_rank');
            $table->string('ciita');
            $table->String('region');
            $table->String('pr');
            $table->String('pn');
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
        Schema::dropIfExists('cassifiche_details');
    }
}
