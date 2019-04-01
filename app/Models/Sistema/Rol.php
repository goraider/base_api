<?php

namespace App\Models\Sistema;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sistema\Usuario;
use App\Models\Sistema\Permiso;


class Rol extends Model
{
    use SoftDeletes;
    
    protected $generarID = false;
    protected $guardarIDServidor = false;
    protected $guardarIDUsuario = false;
    public $incrementing = true;
    
    protected $table = 'roles';  
    protected $fillable = ["id","nombre"];
    
    
    public function permisos(){
      return $this->belongsToMany(Permiso::class, 'permiso_rol', 'rol_id', 'permiso_id');
    }

    public function usuarios(){
      return $this->belongsToMany(Usuario::class, 'rol_usuario', 'rol_id', 'usuario_id');
    }
}
