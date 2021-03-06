<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transacciones\Comision;
use App\Models\Catalogos\Proyecto;

/**
 * @property int $id
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $categiria
 * @property string $rfc
 * @property string $created_at
 * @property string $updated_at
 * @property Comision[] $comisiones
 * @property Proyecto[] $proyectos
 */
class PlantillaPersonal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'plantillas_personal';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'apellido_paterno', 'apellido_materno', 'categiria', 'rfc', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comision()
    {
        return $this->hasMany(Comision::class, 'plantilla_personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyecto()
    {
        return $this->hasMany(Proyecto::class, 'plantilla_personal_id');
    }
}
