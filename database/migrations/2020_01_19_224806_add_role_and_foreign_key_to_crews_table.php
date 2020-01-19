<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleAndForeignKeyToCrewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crews', function (Blueprint $table) {
            $table->text('actor_role');

            $table->unsignedBigInteger('movie_id')->nullable();

            $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crews', function (Blueprint $table) {
            $table->dropColumn('actor_role');
        });
    }
}
