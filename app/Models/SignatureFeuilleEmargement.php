<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SignatureFeuilleEmargement extends Model
{

    const STATUT_PAS_SIGNE = 0;
    const STATUT_SIGNE = 1;
    const STATUT_SIGNER_NON_PRESENT = 2;
    const STATUT_SIGNER_ET_PRESENT = 3;

    use HasFactory;

    protected $fillable = [
        'feuille_emargement_id',
        'eleve_user_id',
        'statut'
    ];

    public function eleve(): HasOne
    {
        return $this->hasOne(Eleve::class);
    }

    public function feuilleEmargement(): HasOne
    {
        return $this->hasOne(FeuilleEmargement::class);
    }
}
