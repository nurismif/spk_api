<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKriteria extends Model
{
    protected $table = 'detail_kriteria';

    protected $with = ['kriteria_ahp'];

    protected $primaryKey = 'id';

    public function kriteria_ahp()
    {
        return $this->belongsTo('App\KriteriaAHP');
    }
}
