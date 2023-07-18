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
 * Class Locale
 * 
 * @property int $id
 * @property int $socio_id
 * @property string $nombre
 * @property int $codigo
 * @property string $direccion
 * @property string $google_map
 * @property string $lat
 * @property string $lang
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Socio $socio
 * @property Collection|Cancha[] $canchas
 *
 * @package App\Models
 */
class Locale extends Model
{
	use SoftDeletes;
	protected $table = 'locales';

	protected $casts = [
		'socio_id' => 'int',
		'codigo' => 'int'
	];

	protected $fillable = [
		'socio_id',
		'nombre',
		'codigo',
		'direccion',
		'google_map',
		'lat',
		'lang',
		'estado'
	];

	public function socio()
	{
		return $this->belongsTo(Socio::class,'socio_id','user_id');
	}

	public function canchas()
	{
		return $this->hasMany(Cancha::class);
	}
}
