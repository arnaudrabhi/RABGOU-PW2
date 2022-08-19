<?php

use App\Models\Classe;
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
        Schema::create('classe_groupe', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Classe::class);
            $table->foreignIdFor(Groupe::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classe_groupe');
    }
};
