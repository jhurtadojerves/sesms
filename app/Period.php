<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = [
        'code','name', 'star', 'end', 'status'
    ];

    public function upss() {
        return $this->hasMany('App\Ups', 'id_period');
    }



}
