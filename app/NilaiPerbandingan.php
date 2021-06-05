<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiPerbandingan extends Model
{
    protected $table = 'nilai_perbandingan';

    protected $primaryKey = 'id';
    
    protected $fillable = ['kriteria_ahp_id', 'target_kriteria_ahp_id', 'nilai_perbandingan']; 

    protected $with = ['kriteria_ahp'];

    public function kriteria_ahp()
    {
        return $this->belongsTo('App\KriteriaAHP');
    }
}
