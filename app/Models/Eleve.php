<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'classe_id',
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


    public function classe() {
        return $this->hasOne(Classe::class, 'id', 'classe_id');
    }

}
