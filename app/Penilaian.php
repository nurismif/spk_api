<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    //
    protected $table = 'penilaian';
    
    protected $fillable = ['user_id', 'kriteria_ahp_id', 'nilai']; 

    // protected $with = ['user', 'kriteria_ahp'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function kriteria_ahp()
    {
        return $this->belongsTo('App\KriteriaAHP');
    }


}
