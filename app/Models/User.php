<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
/**
 * Class Users
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property string|null $facebook_id
 * @property string|null $linkedin_id
 * @property string|null $twitter_id
 * @property string|null $google_id
 * @property int $distrito_id
 * @property string $estado
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Distrito $distrito
 * @property Socio $socio
 *
 *
 * @package App\Models
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function distrito(): BelongsTo
    {
        return $this->belongsTo(Distrito::class);
    }
    public function socio(): HasOne
    {
        return $this->hasOne(Socio::class);
    }
}
