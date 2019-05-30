<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_user', 'user_id', 'role_id');
    }

    public function hasAccess(array $permissions): bool
    {
        foreach ($this->roles as $role){
            if ($role->hasAccess($permissions)){
                return true;
            }
        }
        return false;
    }

    public function hasRole($roleSlug): bool
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }
}
