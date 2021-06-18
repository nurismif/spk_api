<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // JABATAN
    const TIM_PKG_ROLE = 'Tim_PKG';
    const KEPSEK_ROLE = 'Kepsek';
    const GURU_ROLE = 'Guru';

    // JENIS KELAMIN
    const MALE_TYPE = "Pria";
    const FEMALE_TYPE = "Wanita";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nip', 'nama', 'username', 'password', 'jabatan', 'jenis_kelamin', 'jurusan'
    ];

    // protected $with = ['penilaian'];


    public function penilaian()
    {
        return $this->hasMany('App\Penilaian');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $unique = [
    //     'nip', 'username',
    // ];

    public static function formatJabatan($jabatan)
    {
        $jabatan_name = '';
        switch ($jabatan) {
            case self::KEPSEK_ROLE:
                $jabatan_name = 'Kepala Sekolah';
                break;
            case self::TIM_PKG_ROLE:
                $jabatan_name = 'Tim PKG';
                break;
            default:
                $jabatan_name = $jabatan;
                break;
        }
        return $jabatan_name;
    }
}
