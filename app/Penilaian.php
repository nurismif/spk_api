<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    //
    protected $table = 'penilaian';
    
    protected $with = ['user', 'kriteria_ahp'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function kriteria_ahp()
    {
        return $this->belongsTo('App\KriteriaAHP');
    }


}
