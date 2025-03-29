<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Nursery extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps=false;
    protected $fillable = [
        'name',
        'address',
        'city',
        'phone',
        'id_state'
    ];
    public function state()
    {
        return $this->belongsTo(State::class,'id_state');
    }
}
