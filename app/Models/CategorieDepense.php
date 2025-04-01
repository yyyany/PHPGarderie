<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieDepense extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'categoriesdepense';
    public $timestamps = false;
    protected $fillable = [
        'description',
        'pourcentage'
    ];

    /**
     * Get the expenses for this category.
     */
}
