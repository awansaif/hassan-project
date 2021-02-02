<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatestEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('latest_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_image');
            $table->string('secondary_image');
            $table->text('short_description');
            $table->longText('long_decription');
            $table->string('even_price');
            $table->string('event_place');
            $table->string('event_timing');
            $table->string('author_name');
            $table->string('federation_name');
            $table->string('author_image');
            $table->string('further_detail');
            $table->string('longtitude');
            $table->string('latitude');
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
        Schema::dropIfExists('latest_events');
    }
}
