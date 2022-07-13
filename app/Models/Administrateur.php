<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrateur extends Authenticatable
{
    use Notifiable;

    protected $table = 'administrateurs';

    protected $fillable = ['civ', 'nom', 'prenom', 'email', 'password'];

    protected $hidden = ['password',  'remember_token'];
}
