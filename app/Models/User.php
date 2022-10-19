<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Массив атрибутов
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullName',
        'email',
        'birthday',
        'phoneNumber',
        'gender',
        'password',
        'role_id',
        'competence_id',
    ];

    /**
     * Связь с таблицой roles
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Связь с таблицой competences
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }
}
