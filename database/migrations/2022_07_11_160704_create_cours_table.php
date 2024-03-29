<?php

use App\Models\Classe;
use App\Models\Enseignant;
use App\Models\Groupe;
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
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Classe::class);
            $table->foreignIdFor(Groupe::class);
            $table->foreignIdFor(Enseignant::class);
            $table->string('matiere', 25);
            $table->dateTime('date_heure_debut');
            $table->dateTime('date_heure_fin');
            $table->integer('statut')->default('0');
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
        Schema::dropIfExists('cours');
    }
};
