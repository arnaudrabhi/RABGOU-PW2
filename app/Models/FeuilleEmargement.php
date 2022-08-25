<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeuilleEmargement extends Model
{
    use HasFactory;

    function classe() {
        return $this->hasOne(Classe::class);
    }

    function cour() {
        return $this->hasOne(Cour::class);
    }

    function enseignant() {
        return $this->hasOne(Enseignant::class);
    }

}
