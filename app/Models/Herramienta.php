<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Herramienta
 *
 * @property $id
 * @property $IdInterno
 * @property $Serie
 * @property $Nombre
 * @property $Modelo
 * @property $Categoria
 * @property $Proovedor
 * @property $Factura
 * @property $FechaCompra
 * @property $Estado
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Registrosalida[] $registrosalidas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Herramienta extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    static $rules = [
		'IdInterno' => ['required','unique:herramientas'],
		'Serie' => ['required','unique:herramientas'],
		'Nombre' => 'required',
		'Modelo' => 'required',
		'Categoria' => 'required',
		'Proovedor',
        'Factura' => ['required','unique:herramientas'],
        'FechaCompra',
    ];

    static $reglasDos = [
        'IdInterno' => ['unique:herramientas'],
        'Nombre' => 'required',
        'Modelo' => 'required',
        'Categoria' => 'required',
        'Proovedor',
        'FechaCompra',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['IdInterno','Serie','Nombre','Modelo','Categoria','Proovedor','Factura','FechaCompra'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrosalidas()
    {
        return $this->hasMany('App\Models\Registrosalida', 'herramientas_id', 'id');
    }
    

}
