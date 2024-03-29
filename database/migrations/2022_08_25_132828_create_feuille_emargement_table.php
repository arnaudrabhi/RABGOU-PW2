<?php

use App\Models\Classe;
use App\Models\Cour;
use App\Models\Enseignant;
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
        Schema::create('feuille_emargements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Classe::class);
            $table->foreignIdFor(Cour::class);
            $table->foreignIdFor(Enseignant::class);
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
        Schema::dropIfExists('feuille_emargements');
    }
};
