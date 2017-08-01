<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;

class Admin extends Authenticable
{
    /**
     * Mass assignable attributes.
     *
     * @var string
     */
    protected $fillable = [
        'user_uuid', 'fname', 'lname', 'email', 'phone',
        'dob', 'identification', 'password', 'is_active',
        'api_token', 'role_id', 'remember_token', 'merchant_uuid'
    ];

    /**
     * Return the fullname of the user.
     */
    public function fullname()
    {
        return $this->fname .' '. $this->lname;
    }
}
