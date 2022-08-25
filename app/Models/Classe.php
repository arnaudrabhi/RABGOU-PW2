<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom'
    ];

    public function groupes() {
        return $this->belongsToMany(Groupe::class);
    }

    public function feuilles() {
        return $this->belongsToMany(FeuilleEmargement::class);
    }
}
