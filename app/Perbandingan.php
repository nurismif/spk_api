<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perbandingan extends Model
{
    protected $table = 'perbandingan';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'nilai'
    ];

}
