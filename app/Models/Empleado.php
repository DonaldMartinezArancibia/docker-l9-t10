<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $Nombre
 * @property $PrimerApellido
 * @property $SegundoApellido
 * @property $created_at
 * @property $updated_at
 *
 * @property Registroentrada[] $registroentradas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'PrimerApellido' => 'required',
		'SegundoApellido' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','PrimerApellido','SegundoApellido'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registroentradas()
    {
        return $this->hasMany('App\Models\Registroentrada', 'empleados_id', 'id');
    }
    

}
