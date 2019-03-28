<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Rol;

class Permiso extends Model
{
    use SoftDeletes;
    protected $generarID = false;
    protected $guardarIDServidor = false;
    protected $guardarIDUsuario = false;
    protected $fillable = ["id","descripcion","grupo","su","created_at","updated_at"];
    
    public function roles(){
		return $this->belongsToMany(Rol::class, 'permiso_rol', 'permiso_id', 'rol_id');
	}
}
