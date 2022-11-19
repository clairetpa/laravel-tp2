<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'contenu',
        'date',
        'langue',
        'userId'
    ];

    public function articleHasUser(){
        /* ici hasOne */
        return $this->hasOne
        ('App\Models\User','id','userId');
    }
}
