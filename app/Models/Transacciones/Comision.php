<?php

namespace App\Models\Transacciones;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transacciones\Comision;

class Comision extends Model
{
    protected $fillable = ['lugar', 'fecha_salida', 'total'];

    public function comision()
    {
        return $this->belongsTo(Comision::class);
    }

    public function lugar()
    {
        return $this->belongsTo();
    }
}
