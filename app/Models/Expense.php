<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    protected $fillable = [
        'dateTime',
        'amount',
        'nursery_id',
        'commerce_id',
        'category_expense_id'
    ];

    /**
     * Get the nursery that owns the expense.
     */
    public function nursery()
    {
        return $this->belongsTo(Nursery::class);
    }

    /**
     * Get the commerce that owns the expense.
     */
    public function commerce()
    {
        return $this->belongsTo(Commerce::class, "nursery_id");
    }

    /**
     * Get the category that owns the expense.
     */
    public function category()
    {
        return $this->belongsTo(CategorieDepense::class, 'category_expense_id');
    }
}
