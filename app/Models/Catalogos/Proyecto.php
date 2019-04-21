<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $plantilla_personal_id
 * @property string $nombre_proyecto
 * @property string $responsable
 * @property string $created_at
 * @property string $updated_at
 * @property PlantillasPersonal $plantillasPersonal
 */
class Proyecto extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['plantilla_personal_id', 'nombre_proyecto', 'responsable', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plantillasPersonal()
    {
        return $this->belongsTo('App\PlantillasPersonal', 'plantilla_personal_id');
    }
}
