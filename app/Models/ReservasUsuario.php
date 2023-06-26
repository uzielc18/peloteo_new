<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ReservasUsuario
 * 
 * @property int $id
 * @property int $horario_id
 * @property int $pagos_socio_id
 * @property int $user_id
 * @property string $estado_reserva
 * @property string|null $comprobante
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Horario $horario
 * @property PagosSocio $pagos_socio
 * @property User $user
 *
 * @package App\Models
 */
class ReservasUsuario extends Model
{
	use SoftDeletes;
	protected $table = 'reservas_usuarios';

	protected $casts = [
		'horario_id' => 'int',
		'pagos_socio_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'horario_id',
		'pagos_socio_id',
		'user_id',
		'estado_reserva',
		'comprobante',
		'estado'
	];

	public function horario()
	{
		return $this->belongsTo(Horario::class);
	}

	public function pagos_socio()
	{
		return $this->belongsTo(PagosSocio::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
