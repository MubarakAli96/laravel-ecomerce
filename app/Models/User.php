<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Contracts\Permission;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'role',
        'email',
        'status',
        'password',
        'address',
        'phone_no',
        'facebook_link',
        'insta_link',
        'twiter_link',
        'profile_image',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function cart()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    public static function getpermissiongroup()
    {
        $permision_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permision_groups;
    }
    public static function getpermissionByGroupName($group_name)
    {
        $permissions = DB::table('permissions')->select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
        return $permissions;
    }
}
