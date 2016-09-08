<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    use EntrustUserTrait;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $appends = ['full_name', 'name_initials'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'password',
        'avatar',
        'verified',
        'phone',
        'children'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'user_id');
    }

    /**
     * @param $name
     */
    public function assignRole($name)
    {
        $role = Role::where('name', $name)->get();
        $this->roles()->attach($role);
    }

    /**
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * @return mixed|string
     */
    public function getFullNameAttribute()
    {

        return $this->client_type ? $this->enterprise_name : $this->first_name . " " . $this->last_name;
    }


    /**
     * @param $avatar
     * @return string
     */
    public function getAvatarAttribute($avatar)
    {
        return $avatar ? '<img class="img-responsive" alt="profile picture" src="/' . $avatar . '">' : $this->name_initials;
    }

    /**
     * @return string
     */
    public function  getNameInitialsAttribute()
    {
        return $this->client_type ? strtoupper($this->enterprise_name[0]) : strtoupper($this->first_name[0] . $this->last_name[0]);
    }

    /**
     * @param $query
     */
    public function scopeActive($query)
    {
        $query->where('verified', 1);
    }

    /**
     * @param $query
     */
    public function scopeInactive($query)
    {
        $query->where('verified', 0);
    }

    /**
     * @param $query
     * @param $role
     */
    public function scopeWithRole($query, $role)
    {
        $query->whereHas('roles', function ($subQuery) use ($role) {
            $subQuery->where('name', $role);
        });
    }

}
