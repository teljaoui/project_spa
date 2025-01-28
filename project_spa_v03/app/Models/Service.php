<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_image',
        'desigantion'
    ];

    public  function Reservation(){
        return $this->hasMany(Reservation::class);
    }
}
