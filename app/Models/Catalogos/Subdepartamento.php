<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;
use App\Models\Catalogos\OrganoResponsable;

/**
 * @property int $id
 * @property int $organo_responsable_id
 * @property string $nombre_departamento
 * @property string $created_at
 * @property string $updated_at
 * @property OrganoResponsable $organosResponsable
 */
class Subdepartamento extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['organo_responsable_id', 'nombre_departamento', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organoResponsable()
    {
        return $this->belongsTo(OrganoResponsable::class, 'organo_responsable_id');
    }
}
