<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_admin', // Se for usar o campo 'is_admin', certifique-se de que ele está sendo utilizado corretamente
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url'
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relacionamento de um para muitos com a tabela de eventos (proprietário dos eventos).
     */
    public function events()
    {
        return $this->hasMany(\App\Models\Event::class);
    }

    /**
     * Relacionamento de muitos para muitos com a tabela de eventos (participação em eventos).
     */
    public function eventsAsParticipant()
    {
        return $this->belongsToMany(\App\Models\Event::class);
    }

    /**
     * Verifica se o usuário é administrador.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->is_admin === 1; // Verifica o campo 'is_admin' para determinar se o usuário é administrador
    }

    /**
     * Verifica se o usuário é um usuário normal.
     *
     * @return bool
     */
    public function isUser()
    {
        return $this->is_admin === 0; // Verifica se o campo 'is_admin' é 0 para ser um usuário normal
    }

    /**
     * Método que define o valor padrão do campo 'role' para 'user' (0).
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->role)) {
                $user->role = 0; // Definindo o valor padrão como 'user' (0)
            }
            if (empty($user->is_admin)) {
                $user->is_admin = 0; // Definindo o valor padrão para 'is_admin' como 'false' (0)
            }
        });
    }
}
