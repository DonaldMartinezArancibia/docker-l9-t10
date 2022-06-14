<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Registrosalida
 *
 * @property $id
 * @property $herramientas_id
 * @property $empleados_id
 * @property $FechaSalida
 * @property $FechaEntrada
 * @property $ObservacionesSalida
 * @property $ObservacionesEntrada
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
        'empleados_id' => 'required',
		'FechaSalida' => 'required',
		'ObservacionesSalida' => 'required',
    ];

    static $reglasDos = [
        'FechaEntrada' => 'required',
        'ObservacionesEntrada' => 'required',
        'Estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['herramientas_id','empleados_id','FechaSalida','FechaEntrada','ObservacionesSalida','ObservacionesEntrada','Estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function herramienta()
    {
        return $this->hasOne('App\Models\Herramienta', 'id', 'herramientas_id');
    }

    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleados_id');
    }
    

}
