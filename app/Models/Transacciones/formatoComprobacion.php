<?php

namespace App\Models\Transacciones;

use Illuminate\Database\Eloquent\Model;

class formatoComprobacion extends Model
{
    //
    protected $fillable = [
        'comision_id',
        'tipo_comprobacion',
        'url',
        'fecha',
        'created_at',
    ];
    //
    public $table = "formatos_comprobaciones";

    public function comisionFormatoComprobacion()
    {
        return $this->hasMany(Comision::class);
    }

}
