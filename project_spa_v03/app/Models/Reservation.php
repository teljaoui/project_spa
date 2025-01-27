<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['reservation', 'user_id', 'time_id' , 'id_service'];

    public function horaire()
    {
        return $this->belongsTo(Horaire::class, 'time_id');
    }
    
    public function client()
    {
        return $this->belongsTo(Client::class, 'user_id');
    }
    public function Service(){
        return $this->belongsTo(Service::class);
    }
}
