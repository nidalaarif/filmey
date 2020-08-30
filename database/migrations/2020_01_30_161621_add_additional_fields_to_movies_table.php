<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalFieldsToMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->string('rated');
            $table->string('released');
            $table->string('runtime');
            $table->text('genre');
            $table->text('plot');
            $table->string('language');
            $table->string('country');
            $table->text('awards');
            $table->string('rating_imd');
            $table->string('rating_rt');
            $table->string('rating_m');
            $table->string('metascore');
            $table->string('imdbVotes');
            $table->string('imdbID');
            $table->string('dvd');
            $table->string('boxOffice');
            $table->text('production');
            $table->boolean('scraped')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('rated');
            $table->dropColumn('released');
            $table->dropColumn('runtime');
            $table->dropColumn('genre');
            $table->dropColumn('plot');
            $table->dropColumn('language');
            $table->dropColumn('country');
            $table->dropColumn('awards');
            $table->dropColumn('rating_imd');
            $table->dropColumn('rating_rt');
            $table->dropColumn('rating_m');
            $table->dropColumn('metascore');
            $table->dropColumn('imdbVotes');
            $table->dropColumn('imdbID');
            $table->dropColumn('dvd');
            $table->dropColumn('boxOffice');
            $table->dropColumn('production');
            $table->dropColumn('scraped');

        });
    }
}
