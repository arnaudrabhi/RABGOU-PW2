<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = [
          "libelle"
    ];

    public function classes() {
        return $this->belongsToMany(Classe::class);
    }
}
