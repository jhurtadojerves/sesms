<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'card', 'name', 'email', 'gender', 'type', 'phone', 'cell_phone', 'password', 'signature',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function titles() {
        return $this->belongsToMany('App\Title');
    }

    public function upss() {
        return $this->hasMany('App\Ups', 'id_user');
    }

    public function staffs() {
        return $this->hasMany('App\Staff');
    }

    public function isAdmin()
    {
        return $this->type === 'admin';
    }

    public function isTeacher() {
        return $this->type === 'teacher';
    }

    public function isCoordinator() {
        return $this->type === 'coordinator';
    }




}
