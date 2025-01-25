<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['first_name' , 'last_name' , 'phone_number' , 'date_visite', 'heure_de_visite'];

}
