<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClubColumnFederationMovementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('federation_movements', function (Blueprint $table) {
            $table->foreignId('club_id')->constrained('clubs')->onDelete('Cascade');
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
        Schema::table('federation_movements', function (Blueprint $table) {
            $table->dropColumn('club_id');
        });
    }
}
