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

        <p style="margin-bottom: 16px;">
            Tahun : <?= $year ?>
        </p>
        <table border="1" cellspacing="0" cellpadding="4" style="width: 100%; font-size: 14px; color: #333; border-collapse: collapse;">
            <thead style="background-color: #f9f9f9; text-transform: uppercase;">
                <tr>
                    <th style="padding: 8px;">Status</th>
                    <?php for ($i = 0; $i < 12; $i++) : ?>
                        <th style="padding: 8px; text-align: center;"><?= Helpers::getMontName($i) ?></th>
                    <?php endfor; ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 8px;">Sudah Membayar</td>
                    <?php foreach ($sudahMembayar as $d) : ?>
                        <td style="padding: 8px; text-align: center;">
                            <?= $d ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td style="padding: 8px;">Belum Membayar</td>
                    <?php foreach ($belumMembayar as $d) : ?>
                        <td style="padding: 8px; text-align: center;">
                            <?= $d ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 24px; margin-bottom: 8px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 600px;">Total Sudah membayar</td>
                    <td>: <?= $totalSudahMembayar ?> Transaksi</td>
                </tr>
                <tr>
                    <td style="width: 600px;">Total Belum membayar</td>
                    <td>: <?= $totalBelumMembayar ?> Transaksi</td>
                </tr>
            </table>
        </div>
        <hr style="border-top: 1px solid black;">
        <div style="margin-top: 24px; margin-bottom: 8px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 600px;">Total Syahriah</td>
                    <td>: <?= Helpers::formatRupiah($bulanan) ?> </td>
                </tr>
                <tr>
                    <td style="width: 600px;">Pemasukan Lain</td>
                    <td>: <?= Helpers::formatRupiah($pemasukanLain) ?> </td>
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
                    <td>: <?= Helpers::formatRupiah($bulanan) ?> </td>
                </tr>
                <tr>
                    <td style="width: 600px;">Total Tabungan</td>
                    <td>: <?= Helpers::formatRupiah($pemasukanLain) ?> </td>
                </tr>
            </table>
        </div>
    </div>

<?php endif; ?>