<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    protected $fillable =['time'];

    public function Client(){
        $this->belongsTo(Client::class);
    }
    
    public function Horaire(){
        $this->belongsTo(Client::class);
    }
}
