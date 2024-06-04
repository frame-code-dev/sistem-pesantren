<?php

namespace  App\Helpers;

class Helpers
{
    private static $bulan = array(
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
    public static function getMontName($index)
    {

        return self::$bulan[$index];
    }

    public static function formatRupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
    public static function replaceRupiah($rupiah)
    {
        $nominal = str_replace(['Rp.', '.', ' '], '', $rupiah);
        return $nominal;
    }
    public static function formatDate($date)
    {
        $year = date("Y", strtotime($date));
        $month = date("n", strtotime($date));
        $date = date("d", strtotime($date));
        $dateFormat = "$date " . self::$bulan[$month - 1] . " $year";
        return $dateFormat;
    }
}
