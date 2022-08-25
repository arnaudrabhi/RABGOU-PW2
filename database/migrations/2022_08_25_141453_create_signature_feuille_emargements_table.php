<?php

use App\Models\Eleve;
use App\Models\FeuilleEmargement;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signature_feuille_emargements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FeuilleEmargement::class);
            $table->foreignIdFor(Eleve::class);
            $table->integer('statut');
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
        Schema::dropIfExists('signature_feuille_emargements');
    }
};
