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
 * Class Provincia
 * 
 * @property string $id
 * @property string $departamento_id
 * @property string $nombre
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Departamento $departamento
 * @property Collection|Distrito[] $distritos
 *
 * @package App\Models
 */
class Provincia extends Model
{
	use SoftDeletes;
	protected $table = 'provincias';
	public $incrementing = false;

	protected $fillable = [
		'departamento_id',
		'nombre',
		'estado'
	];

	public function departamento()
	{
		return $this->belongsTo(Departamento::class);
	}

	public function distritos()
	{
		return $this->hasMany(Distrito::class);
	}
}
