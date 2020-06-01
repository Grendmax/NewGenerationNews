<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 *
 * @property-read $id
 * @property $name
 * @property $username
 * @property $password
 * @property bool $admin
 * @property $remember_token
 * @property-read $created_at
 * @property-read $updated_at
 * @property Todo[]|Collection $todos
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'password', 'admin','name'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'admin' => 'boolean'
    ];

    function isAdmin() {
        return $this->admin === true;
    }

}
