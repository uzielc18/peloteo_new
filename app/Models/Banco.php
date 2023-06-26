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
 * Class Banco
 * 
 * @property int $id
 * @property string $nombre
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|PagosSocio[] $pagos_socios
 *
 * @package App\Models
 */
class Banco extends Model
{
	use SoftDeletes;
	protected $table = 'bancos';

	protected $fillable = [
		'nombre',
		'estado'
	];

	public function pagos_socios()
	{
		return $this->hasMany(PagosSocio::class);
	}
}
