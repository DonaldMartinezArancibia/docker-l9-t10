<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Empleado
 *
 * @property $id
 * @property $Cedula
 * @property $Nombre
 * @property $PrimerApellido
 * @property $SegundoApellido
 * @property $created_at
 * @property $updated_at
 *
 * @property Registrosalida[] $registrosalidas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    static $rules = [
		'Cedula' => 'required',
		'Nombre' => 'required',
		'PrimerApellido' => 'required',
		'SegundoApellido' => 'required',
    ];

    protected $perPage = 999;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Cedula','Nombre','PrimerApellido','SegundoApellido'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrosalidas()
    {
        return $this->hasMany('App\Models\Registrosalida', 'empleados_id', 'id');
    }
    

}
