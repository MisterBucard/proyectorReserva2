<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    public function habitacion() {
        return $this->belongsTo(Habitacion::class);
    }
    public function huesped() {
        return $this->belongsTo(Huesped::class);
    }
}
