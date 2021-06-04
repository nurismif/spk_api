<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatriksKriteria extends Model
{
    protected $table = 'matriks_kriteria';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'row'
    ];
}
