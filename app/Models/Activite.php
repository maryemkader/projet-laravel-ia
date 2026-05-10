<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = ['titre', 'description', 'categorie'];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}