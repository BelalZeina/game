<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Contracts\LaratrustUser;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\HasRolesAndPermissions;


class Admin extends Authenticatable implements LaratrustUser
{
    use  HasApiTokens, HasFactory, Notifiable;
    use HasRolesAndPermissions;

    protected $fillable = [
        'name',
        'phone',
        'img',
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
    // Define a local scope to get users with the 'admin' role

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    public function levels()
    {
        return  $this->belongsToMany(Level::class, 'admin_levels')
        ->withTimestamps();
    }

}

