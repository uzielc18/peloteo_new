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
 * Class Cancha
 * 
 * @property int $id
 * @property int $locale_id
 * @property int $socio_id
 * @property int $canchas_tipo_id
 * @property int $jugadore_id
 * @property int $codigo
 * @property string $prefijo
 * @property string $direccion
 * @property string $aforo
 * @property string $google_map
 * @property string $lat
 * @property string $lang
 * @property int $min_horas
 * @property int $max_horas
 * @property float $precio
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $distrito_id
 * 
 * @property CanchasTipo $canchas_tipo
 * @property Distrito $distrito
 * @property Jugadore $jugadore
 * @property Locale $locale
 * @property Socio $socio
 * @property Collection|Horario[] $horarios
 * @property Collection|Imagene[] $imagenes
 *
 * @package App\Models
 */
class Cancha extends Model
{
	use SoftDeletes;
	protected $table = 'canchas';

	protected $casts = [
		'locale_id' => 'int',
		'socio_id' => 'int',
		'canchas_tipo_id' => 'int',
		'jugadore_id' => 'int',
		'codigo' => 'int',
		'min_horas' => 'int',
		'max_horas' => 'int',
		'precio' => 'float'
	];

	protected $fillable = [
		'locale_id',
		'socio_id',
		'canchas_tipo_id',
		'jugadore_id',
		'codigo',
		'prefijo',
		'direccion',
		'aforo',
		'google_map',
		'lat',
		'lang',
		'min_horas',
		'max_horas',
		'precio',
		'estado',
		'distrito_id'
	];

	public function canchas_tipo()
	{
		return $this->belongsTo(CanchasTipo::class);
	}

	public function distrito()
	{
		return $this->belongsTo(Distrito::class);
	}

	public function jugadore()
	{
		return $this->belongsTo(Jugadore::class);
	}

	public function locale()
	{
		return $this->belongsTo(Locale::class);
	}

	public function socio()
	{
		return $this->belongsTo(Socio::class);
	}

	public function horarios()
	{
		return $this->hasMany(Horario::class);
	}

	public function imagenes()
	{
		return $this->hasMany(Imagene::class);
	}
}
