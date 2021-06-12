<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WpMethod extends Model
{
    protected $fillable = [
        'user_id', 'wp_value', 'rank'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
