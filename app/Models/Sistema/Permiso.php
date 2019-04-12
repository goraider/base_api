<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;


class Permiso extends Model
{

    protected $hidden = ['pivot'];

    protected $fillable = ["id","descripcion","grupo","su","created_at","updated_at"];

    public $table = 'permisos';

    public function PermisoRoles(){

      return $this->belongsToMany(Rol::class, 'permiso_rol', 'rol_id', 'permiso_id');
      
    }
    
    public function PermisoUsuarios(){

      return $this->belongsToMany(Permiso::class, 'permiso_usuario', 'permiso_id', 'usuario_id');
      
    }
    
}
