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
        return $this->belongsTo(User::class);
    }

    public function kriteriaAhp()
    {
        return $this->belongsTo(KriteriaAHP::class, 'kriteria_ahp_id');
    }
}
