<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    /* protected $fillable = [
        'name',
        'email',
        'password',
    ]; */

    protected $guarded = ['id'];
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

    protected $with = ['role'];
    protected $load = ['log_products', 'log_categories', 'log_users'];



    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function log_users()
    {
        return $this->hasMany(LogUsers::class);
    }

    public function log_products()
    {
        return $this->hasMany(LogProducts::class);
    }

    public function log_categories()
    {
        return $this->hasMany(LogCategories::class);
    }

    public function hasRole($role)
    {
        // dd($role == strtolower($this->role->name)); -> true
        // check param $role dengan field usertype
        if ($role == strtolower($this->role->name)) {
            return true;
        }
        return false;
    }
}
