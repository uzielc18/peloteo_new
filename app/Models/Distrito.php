<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Distrito
 * 
 * @property string $id
 * @property string $departamento_id
 * @property string $provincia_id
 * @property string $nombre
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Departamento $departamento
 * @property Provincia $provincia
 * @property Collection|Cancha[] $canchas
 *
 * @package App\Models
 */
class Distrito extends Model
{
	use SoftDeletes;
	protected $table = 'distritos';
	public $incrementing = false;

	protected $fillable = [
		'departamento_id',
		'provincia_id',
		'nombre',
		'estado'
	];

	public function departamento()
	{
		return $this->belongsTo(Departamento::class);
	}

	public function provincia()
	{
		return $this->belongsTo(Provincia::class);
	}

	public function canchas()
	{
		return $this->hasMany(Cancha::class);
	}
}
