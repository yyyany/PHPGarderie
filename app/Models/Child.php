<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'adresse',
        'ville',
        'province',
        'telephone'
    ];
    protected $casts = [
        'date_naissance' => 'date',
    ];
} 