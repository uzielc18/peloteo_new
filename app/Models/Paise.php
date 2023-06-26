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
 * Class Paise
 * 
 * @property string $id
 * @property string $nombre
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Departamento[] $departamentos
 *
 * @package App\Models
 */
class Paise extends Model
{
	use SoftDeletes;
	protected $table = 'paises';
	public $incrementing = false;

	protected $fillable = [
		'nombre',
		'estado'
	];

	public function departamentos()
	{
		return $this->hasMany(Departamento::class);
	}
}
