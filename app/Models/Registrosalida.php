<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Registrosalida
 *
 * @property $id
 * @property $herramientas_id
 * @property $FechaSalida
 * @property $Observaciones
 * @property $created_at
 * @property $updated_at
 *
 * @property Herramienta $herramienta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Registrosalida extends Model
{
    
    static $rules = [
		'herramientas_id' => 'required',
		'FechaSalida' => 'required',
		'Observaciones' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['herramientas_id','FechaSalida','Observaciones'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function herramienta()
    {
        return $this->hasOne('App\Models\Herramienta', 'id', 'herramientas_id');
    }
    

}
