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
 * Class PagosSocio
 * 
 * @property int $id
 * @property int $socio_id
 * @property int $pagos_tipo_id
 * @property string|null $numero_celular
 * @property string|null $numero_cc
 * @property string|null $nuemro_cci
 * @property string|null $qr_imagen
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $banco_id
 * 
 * @property Banco $banco
 * @property PagosTipo $pagos_tipo
 * @property Socio $socio
 * @property Collection|ReservasUsuario[] $reservas_usuarios
 *
 * @package App\Models
 */
class PagosSocio extends Model
{
	use SoftDeletes;
	protected $table = 'pagos_socios';

	protected $casts = [
		'socio_id' => 'int',
		'pagos_tipo_id' => 'int',
		'banco_id' => 'int'
	];

	protected $fillable = [
		'socio_id',
		'pagos_tipo_id',
		'numero_celular',
		'numero_cc',
		'nuemro_cci',
		'qr_imagen',
		'estado',
		'banco_id'
	];

	public function banco()
	{
		return $this->belongsTo(Banco::class);
	}

	public function pagos_tipo()
	{
		return $this->belongsTo(PagosTipo::class);
	}

	public function socio()
	{
		return $this->belongsTo(Socio::class);
	}

	public function reservas_usuarios()
	{
		return $this->hasMany(ReservasUsuario::class);
	}
}
