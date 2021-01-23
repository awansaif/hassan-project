<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbodroItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albodro_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('albodro_id')->constrained('albodro_categories')->onDelete('Cascade');
            $table->string('title');
            $table->string('image');
            $table->timestamp('year');
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
        Schema::dropIfExists('albodro_items');
    }
}
