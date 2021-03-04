<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('name',90);
            $table->string('email')->unique();
            $table->string('resident');
            $table->string('street');
            $table->string('postal_code');
            $table->string('fiscal_code');
            $table->string('club_of_belonging');
            $table->string('gender');
            $table->string('dob');
            $table->string('tel_number');
            $table->boolean('men')->default(0);
            $table->boolean('women')->default(0);
            $table->boolean('special')->default(0);
            $table->boolean('veterans')->default(0);
            $table->boolean('mental_health_center')->default(0);
            $table->boolean('agree')->default(0);

            $table->string('total_payment');
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
        Schema::dropIfExists('memberships');
    }
}
