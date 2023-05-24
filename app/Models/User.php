<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'numCNI',
        "nom",
        "prenom",
        "dateNaiss",
        "lieuNaiss",
        "telephone",
        "signature",
        "empreintes",
        "visage",
        "taille",
        "dateEnrollement",
        "dateEmission",
        "dateExpiration",
        'sexe',
        'profession',
        "nationalite_id",
        "email",
        "password",
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
        'password' => 'hashed',
    ];

    public function nationalite()
    {
        return $this->belongsTo(Nationalite::class);
    }

    public function signalements()
    {
        return $this->hasMany(Signalement::class);
    }

    public function parent()
    {
        return $this->belongsToMany(User::class, "parents", "user_id", "parent_id")->withPivot(["type"]);
    }
}
