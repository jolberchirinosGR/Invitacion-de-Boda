<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'confirm',
        'phone',
        'arrival',
        'id_role',
        'id_responsable',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'id_responsable', 'id');
    }

    public function responsables()
    {
        return $this->hasMany(User::class, 'id_responsable');
    }


}
