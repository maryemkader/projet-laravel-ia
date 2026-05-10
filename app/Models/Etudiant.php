<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = ['nom', 'email', 'age'];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}