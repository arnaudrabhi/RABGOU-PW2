<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ADMINISTRATEUR = 1;
    const ADMINISTRATION = 2;
    const ENSEIGNANT = 3;
    const ELEVE = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'civ',
        'nom',
        'prenom',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function roles() {
//        return $this->hasOne(Role::class);
//    }

    public function eleve()
    {
        if ($this->isRole(User::ELEVE)) {
            return $this->belongsTo(Eleve::class, 'id', 'user_id');
        }
        return null;
    }

    public function enseignant() {
        if ($this->isRole(User::ENSEIGNANT)) {
            return $this->belongsTo(Enseignant::class, 'id', 'user_id');
        }
        return null;
    }

    public function getRole(): int
    {
        return match ($this->role) {
            1 => User::ADMINISTRATEUR,
            2 => User::ADMINISTRATION,
            3 => User::ENSEIGNANT,
            default => User::ELEVE,
        };
    }

    /**
     * @param $roleEnum
     * User::ADMINISTRATEUR, User::ADMINISTRATION, User::ENSEIGNANT, User::ELEVE
     * @return bool
     */
    public function isRole($roleEnum): bool
    {
        if ($roleEnum == $this->role) {
            return true;
        }
        return false;
    }
}
