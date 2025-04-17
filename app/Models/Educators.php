<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educators extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'LastName',
        'FirstName',
        'BirthDayDate',
        'Adress',
        'City',
        'State',
        'Phone'
    ];
}
