<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriteriaAHP extends Model
{
    const BENEFIT_TYPE = 'Benefit';
    const COST_TYPE = 'Cost';

    protected $table = 'kriteria_ahp';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'bobot', 'tipe'
    ];
}
