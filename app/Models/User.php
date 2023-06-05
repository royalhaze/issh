<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    const CLIENT_USER_TYPE = 0;
    const ADMIN_USER_TYPE = 1;
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    public function BandwidthUsage()
    {
        return $this->hasOne(BandwidthUsage::class);
    }
}
