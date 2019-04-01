<?php

namespace App\Models\Sistema;

//checar base modelo use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sistema\Rol;

class Usuario extends Model
{
    use SoftDeletes;
    protected $generarID = false;
    protected $guardarIDUsuario = false;
    protected $fillable = ["id","email","password","activo","salud_id","nombre","apellido_paterno","apellido_materno","su"];
    
    public function roles(){
        return $this->belongsToMany(Rol::class, 'rol_usuario', 'usuario_id', 'rol_id');
    }
    
    // public function log(){
    //     return $this->hasMany('App\Models\LogInicioSesion','usuario_id');
    // }

    /**
     * @return string
     */
    public function getAuthIdentifierName()
    {
        // Return the name of unique identifier for the user (e.g. "id")
    }

    /**
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        // Return the unique identifier for the user (e.g. their ID, 123)
    }

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        // Returns the (hashed) password for the user
    }

    /**
     * @return string
     */
    public function getRememberToken()
    {
        // Return the token used for the "remember me" functionality
    }

    /**
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // Store a new token user for the "remember me" functionality
    }

    /**
     * @return string
     */
    public function getRememberTokenName()
    {
        // Return the name of the column / attribute used to store the "remember me" token
    }

}
