<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AhpMethod extends Model
{
    protected $fillable = [
        'user_id', 'ahp_value', 'rank'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
