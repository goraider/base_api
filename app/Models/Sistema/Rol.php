<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;


class Rol extends Model
{
    use SoftDeletes;
    
  
    protected $hidden = ['pivot'];

    protected $fillable = ["id","nombre"];

    public $table = 'roles';
    
    
    public function permisosRol(){
      
      return $this->belongsToMany(Permiso::class, 'permiso_rol', 'rol_id', 'permiso_id');

    }

    public function usuariosRol(){
      
      return $this->belongsToMany(Usuario::class, 'rol_usuario', 'rol_id', 'usuario_id');

    }
}
