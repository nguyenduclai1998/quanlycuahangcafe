<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserModel extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'users';
    protected $fillable = [
    	'id',
    	'name',
    	'email',
    	'user_code',
    	'id_card',
    	'gender',
    	'status',
    	'email_verified_at',
    	'password',
    	'role_id'
    ];
}
