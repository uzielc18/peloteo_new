<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Imagene
 * 
 * @property int $id
 * @property int $cancha_id
 * @property string|null $nombre_real
 * @property string $nombre_url
 * @property string $url
 * @property string|null $peso
 * @property string|null $portada
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Cancha $cancha
 *
 * @package App\Models
 */
class Imagene extends Model
{
	use SoftDeletes;
	protected $table = 'imagenes';

	protected $casts = [
		'cancha_id' => 'int'
	];

	protected $fillable = [
		'cancha_id',
		'nombre_real',
		'nombre_url',
		'url',
		'peso',
		'portada',
		'estado'
	];

	public function cancha()
	{
		return $this->belongsTo(Cancha::class);
	}
}
