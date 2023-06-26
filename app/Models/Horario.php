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
 * Class Horario
 * 
 * @property int $id
 * @property int $cancha_id
 * @property string $estado_horario
 * @property string $hora
 * @property string $dia
 * @property string $mes
 * @property string $anio
 * @property float $precio
 * @property Carbon $fecha_horario
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Cancha $cancha
 * @property Collection|ReservasUsuario[] $reservas_usuarios
 *
 * @package App\Models
 */
class Horario extends Model
{
	use SoftDeletes;
	protected $table = 'horarios';

	protected $casts = [
		'cancha_id' => 'int',
		'precio' => 'float',
		'fecha_horario' => 'datetime'
	];

	protected $fillable = [
		'cancha_id',
		'estado_horario',
		'hora',
		'dia',
		'mes',
		'anio',
		'precio',
		'fecha_horario',
		'estado'
	];

	public function cancha()
	{
		return $this->belongsTo(Cancha::class);
	}

	public function reservas_usuarios()
	{
		return $this->hasMany(ReservasUsuario::class);
	}
}
