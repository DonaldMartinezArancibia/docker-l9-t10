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
 * @property $Proveedor
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
		'categorias_id' => 'required',
		'Proveedor',
        'Factura' => ['required','unique:herramientas'],
        'FechaCompra',
        'Foto',
    ];

    static $reglasDos = [
        'IdInterno' => ['unique:herramientas'],
        'Nombre' => 'required',
        'Modelo' => 'required',
        'categorias_id' => 'required',
        'Proveedor',
        'FechaCompra',
        'Foto',
    ];

    protected $perPage = 999;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['IdInterno','Serie','Nombre','Modelo','categorias_id','Proveedor','Factura','FechaCompra','Foto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrosalidas()
    {
        return $this->hasMany('App\Models\Registrosalida', 'herramientas_id', 'id');
    }
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categorias_id');
    }
    

}
