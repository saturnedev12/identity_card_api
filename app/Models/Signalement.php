<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signalement extends Model
{
    use HasFactory;

    protected $fillable = [
        "corrections",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
