<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    protected $fillable = ['etudiant_id', 'activite_id', 'date', 'duree', 'notes'];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function activite()
    {
        return $this->belongsTo(Activite::class);
    }
}