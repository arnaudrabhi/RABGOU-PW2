<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FeuilleEmargement extends Model
{
    use HasFactory;

    function classe(): belongsTo
    {
        return $this->belongsTo(Classe::class);
    }

    function cour(): belongsTo
    {
        return $this->belongsTo(Cour::class);
    }

    function enseignant(): belongsTo
    {
        return $this->belongsTo(Enseignant::class);
    }

}
