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
 * Class Departamento
 * 
 * @property string $id
 * @property string $paise_id
 * @property string $nombre
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Paise $paise
 * @property Collection|Distrito[] $distritos
 * @property Collection|Provincia[] $provincias
 *
 * @package App\Models
 */
class Departamento extends Model
{
	use SoftDeletes;
	protected $table = 'departamentos';
	public $incrementing = false;

	protected $fillable = [
		'paise_id',
		'nombre',
		'estado'
	];

	public function paise()
	{
		return $this->belongsTo(Paise::class);
	}

	public function distritos()
	{
		return $this->hasMany(Distrito::class);
	}

	public function provincias()
	{
		return $this->hasMany(Provincia::class);
	}
}
