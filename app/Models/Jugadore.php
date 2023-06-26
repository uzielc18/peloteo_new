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
 * Class Jugadore
 * 
 * @property int $id
 * @property int $codigo
 * @property string $nombre
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Cancha[] $canchas
 *
 * @package App\Models
 */
class Jugadore extends Model
{
	use SoftDeletes;
	protected $table = 'jugadores';

	protected $casts = [
		'codigo' => 'int'
	];

	protected $fillable = [
		'codigo',
		'nombre',
		'estado'
	];

	public function canchas()
	{
		return $this->hasMany(Cancha::class);
	}
}
