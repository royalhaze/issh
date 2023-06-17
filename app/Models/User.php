<?php

namespace App\Models;

use App\Helpers\BashHelper;
use Carbon\Carbon;
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

    public static function create_user($username,$password,$is_from_now,$expire,$bandwidth_limit,$concurrent_users,$email = null,$mobile = null)
    {
        $data = [
            'username' => $username,
            'password' => $password,
            'bandwidth_limit' => $bandwidth_limit,
            'connection_limit' => $concurrent_users,
            'email' => $email,
            'mobile' => $mobile,
        ];

        if ($is_from_now == 'true'){
            $data['expire_date'] = Carbon::parse($expire);
            $data['start_date'] = now();
        }else{
            $data['start_after_use'] = intval($expire);
        }

        $user = self::create($data);

        if ($user instanceof User){
            BashHelper::create_user($username,$password);

            return $user;
        }else{
            return  false;
        }
    }
}
