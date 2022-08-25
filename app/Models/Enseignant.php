<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
