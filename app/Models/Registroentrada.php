<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Registroentrada
 *
 * @property $id
 * @property $herramientas_id
 * @property $FechaEntrada
 * @property $Observaciones
 * @property $created_at
 * @property $updated_at
 *
 * @property Herramienta $herramienta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Registroentrada extends Model
{
    
    static $rules = [
		'herramientas_id' => 'required',
        'empleados_id' => 'required',
		'FechaEntrada' => 'required',
		'Observaciones' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['herramientas_id','empleados_id','FechaEntrada','Observaciones'];


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
