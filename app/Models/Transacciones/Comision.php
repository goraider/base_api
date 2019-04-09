<?php

namespace App\Models\Transacciones;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Comision extends Model
{

    protected $fillable = [
        'id',
        'motivo_comision',
        'no_comision',
        'no_memorandum',
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
    
    public $table = "comisiones";

    public function lugaresComision()
    {
        return $this->hasMany(LugarComision::class);
    }

//     public function motivosComision()
//     {
//         return $this->hasMany(MotivoComision::class);
//     }

//     public function formatosComprobacionComision()
//     {
//         return $this->hasMany(FormatosComprobacionComision::class);
//     }
// //checar si solo uno o tendra muchas claves la comision
//     public function clavePresupuestalComision()
//     {
//         return $this->hasMany(ClavePresupuestalComision::class);
//     }

}
