<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const VERIFIED_USER = 'true';
    const UNVERIFIED_USER = 'false';

    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';
    protected $table = 'users';
    protected $dates =['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    /*
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    public function isVerified()
    {
        return $this->verified == user::VERIFIED_USER;
    }
    public function isAdmin()
    {
        return $this->admin == user::ADMIN_USER;
    }

     public function genrateVerificationCode()
    {
        return Str::random(40);
    }
    
 
}
