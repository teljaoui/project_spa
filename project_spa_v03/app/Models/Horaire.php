<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;
    protected $fillable = ['time' , 'id_service'];
    public function Reservation()
    {
        return $this->hasMany(Reservation::class);
    }
    public function Service(){
        return $this->belongsTo(Service::class);
    }
    
}
