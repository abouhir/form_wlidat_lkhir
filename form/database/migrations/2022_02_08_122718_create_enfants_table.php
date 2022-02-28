<?php

use App\Models\Responsable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnfantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfants', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("taille_vtm");
            $table->string("taille_chaussure");
            $table->string("niveaux_etd");
            $table->float("moyenne_s1");
            $table->float("moyenne_s2");
            $table->foreignIdFor(Responsable::class);
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
        Schema::dropIfExists('enfants');
    }
}
