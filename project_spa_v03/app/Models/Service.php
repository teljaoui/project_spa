<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'service_image',
        'designation',
        'nb_reservation'
    ];
    public function Horaire(){
        return $this->belongsTo(Horaire::class);
    }

    public function Reservation(){
        return $this->hasMany(Reservation::class);
    }
}
