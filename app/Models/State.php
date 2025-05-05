<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps=false;
    protected $fillable = [
        'description',
    ];
    public function nursery(){
        return $this->hasMany(Nursery::class, 'id_state');
    }
}
