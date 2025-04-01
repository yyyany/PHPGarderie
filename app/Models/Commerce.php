<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    protected $fillable = [
        'description',
        'address',
        'phone'
    ];

    /**
     * Get the expenses for this commerce.
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}