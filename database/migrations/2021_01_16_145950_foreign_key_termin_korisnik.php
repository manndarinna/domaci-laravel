<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeyTerminKorisnik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('termin', function (Blueprint $table) {
            $table->unsignedBigInteger('kreirao');
            $table->foreign('kreirao')->references('id')->on('korisnik')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('termin', function (Blueprint $table) {
            $table->dropForeign('termin_kreirao_foreign');
        });
    }
}
