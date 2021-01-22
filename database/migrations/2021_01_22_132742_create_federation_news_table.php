<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFederationNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('federation_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('federation_id')->constrained('federation_movements')->onDelete('Cascade');
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
        Schema::dropIfExists('federation_news');
    }
}
