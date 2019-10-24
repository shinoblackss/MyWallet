<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $guarded = [];

    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }
}
