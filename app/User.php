<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Product;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     public $timestamps = true;
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address','level','status','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles() 
    {
        return $this->belongsToMany(Role::class);
    }

    public function checkRoles($roles) 
    {
        if ( ! is_array($roles)) {
            $roles = [$roles];    
        }

        if ( ! $this->hasAnyRole($roles)) {
            auth()->logout();
            abort(404);
        }
    }

    public function hasAnyRole($roles): bool
    {
        return (bool) $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role): bool
    {
        return (bool) $this->roles()->where('name', $role)->first();
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'user_id', 'id');
    }
    public function messages() {
        return $this->hasMany(Message::class);
    }
    public function chatrooms() {
        return $this->hasMany('App\Models\ChatRoom','user_ids')->where('user_ids', 'LIKE', '%'.Auth::user()->id.'%');
    }
}
