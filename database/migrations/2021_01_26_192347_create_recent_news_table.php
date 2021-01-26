<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecentNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recent_news', function (Blueprint $table) {
            $table->id();
            $table->integer('federation_news_id')->nullable();
            $table->integer('news_id')->nullable();
            $table->string('title');
            $table->string('date_and_time');
            $table->string('featured_image');
            $table->text('detail');
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
        Schema::dropIfExists('recent_news');
    }
}
