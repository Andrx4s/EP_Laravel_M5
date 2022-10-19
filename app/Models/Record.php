<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    /**
     * Автоматический массив атрибутов
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * Связь с таблицой users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }
    /**
     * Связь с таблицой users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctor()
    {
        return $this->hasMany(User::class);
    }
}
