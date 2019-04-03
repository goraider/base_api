<?php

namespace App\Models\Transacciones;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transacciones\Comision;

class Comision extends Model
{
    protected $fillable = [
        'id', 'motivo_comision',
        'no_comision', 'no_memorandum',
        'usuario_id',
        'nombre_proyecto',
        'es_vehiculo_oficial',
        'placas',
        'modelo',
        'status_comision',
        'funcionario_autoriza_comision',
        'puesto_autoriza_comision',
        'created_at'
    ];

    public function comision()
    {
        return $this->belongsTo(Comision::class);
    }

    public function lugar()
    {
        return $this->belongsTo();
    }
}
