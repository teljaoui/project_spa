<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;
    protected $fillable = ['time'];
    public function Reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
