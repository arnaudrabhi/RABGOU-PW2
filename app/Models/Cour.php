<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;

    protected $fillable = [
        'classe_id',
        'groupe_id',
        'enseignant_user_id',
        'date_heure_debut',
        'date_heure_fin',
        'statut'
    ];


    public function classe() {
        return $this->belongsTo(Cour::class);
    }
}
