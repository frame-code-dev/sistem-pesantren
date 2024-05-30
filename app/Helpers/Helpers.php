<?php

namespace  App\Helpers;

class Helpers
{

    public static function getMontName($index)
    {
        $bulan = array(
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        );
        return $bulan[$index];
    }
}
