<?php

namespace App\Observers;

use App\KriteriaAHP;
use App\NilaiPerbandingan;

class KriteriaAHPObserver
{
    /**
     * Handle the kriteria a h p "created" event.
     *
     * @param  \App\KriteriaAHP  $kriteriaAHP
     * @return void
     */
    public function created(KriteriaAHP $kriteriaAHP)
    {
        $kriteriaAhps = KriteriaAHP::get();
        foreach ($kriteriaAhps as $kriteriaAhpTarget) {
            NilaiPerbandingan::create([
                'kriteria_ahp_id' => $kriteriaAHP->id,
                'target_kriteria_ahp_id' => $kriteriaAhpTarget->id,
                'nilai_perbandingan' => 0
            ]);
        }

        foreach ($kriteriaAhps as $kriteriaAhpTarget) {
            if ($kriteriaAhpTarget->id !=  $kriteriaAHP->id) {
                NilaiPerbandingan::create([
                    'kriteria_ahp_id' => $kriteriaAhpTarget->id,
                    'target_kriteria_ahp_id' => $kriteriaAHP->id,
                    'nilai_perbandingan' => 0
                ]);
            }
        }
    }

    /**
     * Handle the kriteria a h p "updated" event.
     *
     * @param  \App\KriteriaAHP  $kriteriaAHP
     * @return void
     */
    public function updated(KriteriaAHP $kriteriaAHP)
    {
        //
    }

    /**
     * Handle the kriteria a h p "deleted" event.
     *
     * @param  \App\KriteriaAHP  $kriteriaAHP
     * @return void
     */
    public function deleted(KriteriaAHP $kriteriaAHP)
    {
        //
    }

    /**
     * Handle the kriteria a h p "restored" event.
     *
     * @param  \App\KriteriaAHP  $kriteriaAHP
     * @return void
     */
    public function restored(KriteriaAHP $kriteriaAHP)
    {
        //
    }

    /**
     * Handle the kriteria a h p "force deleted" event.
     *
     * @param  \App\KriteriaAHP  $kriteriaAHP
     * @return void
     */
    public function forceDeleted(KriteriaAHP $kriteriaAHP)
    {
        //
    }
}
