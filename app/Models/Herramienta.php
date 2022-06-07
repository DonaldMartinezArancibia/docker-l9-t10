<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Herramienta
 *
 * @property $id
 * @property $IdInterno
 * @property $Serie
 * @property $Nombre
 * @property $Modelo
 * @property $Categoria
 * @property $Factura
 * @property $created_at
 * @property $updated_at
 *
 * @property Registrosalida[] $registrosalidas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Herramienta extends Model
{
    
    static $rules = [
		'IdInterno' => ['required','unique:herramientas'],
        'Serie' => 'required',
		'Nombre' => ['required','unique:herramientas'],
		'Modelo' => 'required',
		'Categoria' => 'required',
		'Factura' => ['required','unique:herramientas']
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['IdInterno','Serie','Nombre','Modelo','Categoria','Factura'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrosalidas()
    {
        return $this->hasMany('App\Models\Registrosalida', 'herramientas_id', 'id');
    }
    

}
