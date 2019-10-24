<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $guarded = [];

    public function tranfers(){
        return $this->hasMany(Transfer::class);
    }
}
