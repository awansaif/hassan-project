<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFederaationSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('federaation_sponsors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('federation_id')->constrained('federation_movements')->onDelete('Cascade');
            $table->text('sponsor_description');
            $table->string('sponser_image');
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
        Schema::dropIfExists('federaation_sponsors');
    }
}
