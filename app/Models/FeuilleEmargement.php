<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FeuilleEmargement extends Model
{
    use HasFactory;

    function classe(): HasOne
    {
        return $this->hasOne(Classe::class);
    }

    function cour(): HasOne
    {
        return $this->hasOne(Cour::class);
    }

    function enseignant(): HasOne
    {
        return $this->hasOne(Enseignant::class);
    }

}
