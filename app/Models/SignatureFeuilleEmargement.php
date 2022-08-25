<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SignatureFeuilleEmargement extends Model
{
    use HasFactory;

    public function eleve(): HasOne
    {
        return $this->hasOne(Eleve::class);
    }

    public function feuilleEmargement(): HasOne
    {
        return $this->hasOne(FeuilleEmargement::class);
    }
}
