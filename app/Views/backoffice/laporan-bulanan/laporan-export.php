<?php

use App\Helpers\Helpers;

if ($filter) : ?>

    <div style="background-color: white; width: 100%; overflow-x: auto;">
        <p style="text-align: right; width: 100%;"><?= date("d/m/Y") ?></p>

        <hr style="border-top: 1px solid black;">
        <div style="width: 100%; text-align: center;">
            <h1 style="max-width: 600px; margin: 0 auto;">Laporan Tahunan Keuangan Pondok pesantren 'inayatullah</h1>
            <p style="text-align: center;">Jalan Monjali - Yogyakarta</p>
        </div>
        <hr style="border-top: 1px solid black;">
        <div style="margin-top: 24px; margin-bottom: 8px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 600px;">Bulan</td>
                    <td>: <?= $month ?> </td>
                </tr>
                <tr>
                    <td style="width: 600px;">Tahun</td>
                    <td>: <?= $year ?> </td>
                </tr>
            </table>
        </div>
        <hr style="border-top: 1px solid black;">
        <div style="margin-top: 24px; margin-bottom: 8px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 600px;">Total Sudah membayar</td>
                    <td>: <?= $sudah_membayar ?> Transaksi</td>
                </tr>
                <tr>
                    <td style="width: 600px;">Total Belum membayar</td>
                    <td>: <?= $belum_membayar ?> Transaksi</td>
                </tr>
            </table>
        </div>
        <hr style="border-top: 1px solid black;">
        <div style="margin-top: 24px; margin-bottom: 8px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 600px;">Total Syahriah</td>
                    <td>: <?= Helpers::formatRupiah($syariah) ?> </td>
                </tr>
                <tr>
                    <td style="width: 600px;">Pemasukan Lain</td>
                    <td>: <?= Helpers::formatRupiah($pemasukan_lain) ?> </td>
                </tr>
                <tr>
                    <td style="width: 600px;">Pengeluaran</td>
                    <td>: <?= Helpers::formatRupiah($pengeluaran) ?> </td>
                </tr>
            </table>
        </div>
        <hr style="border-top: 1px solid black;">
        <div style="margin-top: 24px; margin-bottom: 8px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 600px;">Total Tahun Ini</td>
                    <td>: <?= Helpers::formatRupiah($total) ?> </td>
                </tr>
                <tr>
                    <td style="width: 600px;">Total Tabungan</td>
                    <td>: <?= Helpers::formatRupiah($total_tabungan) ?> </td>
                </tr>
            </table>
        </div>
    </div>

<?php endif; ?>