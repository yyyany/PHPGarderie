<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presences extends Model
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
        'child_id',
        'educator_id',
        'nursery_id',
    ];

   
    public function Educators()
    {
        return $this->belongsTo(Educators::class, 'educator_id','id');
    }

    /**
     * Get the commerce that owns the expense.
     */
        public function Child()
        {
            return $this->belongsTo(Child::class, 'child_id', 'id');

        }

    /**
     * Get the nursery that owns the presence.
     */
    public function Nursery()
    {
        return $this->belongsTo(Nursery::class, 'nursery_id','id');
    }

}
