<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Socio
 *
 * @property int $user_id
 * @property string|null $razon_social
 * @property string|null $ruc
 * @property string|null $dni
 * @property string|null $direccion
 * @property string|null $telefono
 * @property string|null $celular
 * @property string|null $correo_personal
 * @property string|null $correo_empresarial
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Cancha[] $canchas
 * @property Collection|Locale[] $locales
 * @property Collection|PagosSocio[] $pagos_socios
 *
 * @package App\Models
 */
class Socio extends Model
{
	use SoftDeletes;
	protected $table = 'socios';
	protected $primaryKey = 'user_id';
	public $incrementing = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'razon_social',
		'ruc',
		'dni',
		'direccion',
		'telefono',
		'celular',
		'correo_personal',
		'correo_empresarial',
		'estado'
	];

	public function canchas()
	{
		return $this->hasMany(Cancha::class);
	}

	public function locales()
	{
		return $this->hasMany(Locale::class);
	}

	public function pagos_socios()
	{
		return $this->hasMany(PagosSocio::class);
	}
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
