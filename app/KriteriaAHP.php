<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriteriaAHP extends Model
{
    protected $table = 'kriteria_ahp';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'bobot', 'tipe'
    ];
}
