<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* classe Etudiant qui va communiquer avec a db */
class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'phone',
        'email',
        'date_naissance',
        'villeId',
        'userId'
    ];

    public function etudiantHasVille(){
        /* ici hasOne */
        return $this->hasOne
        ('App\Models\Ville','id','villeId');
    }

    public function etudiantHasUser(){
        /* ici hasOne */
        return $this->hasOne
        ('App\Models\User','id','userId');
    }

}
