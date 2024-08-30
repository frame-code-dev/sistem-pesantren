<?php

use App\Helpers\Helpers;

if ($filter) : ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <div style="background-color: white; width: 100%; overflow-x: auto;">
        <p style="text-align: right; width: 100%;"><?= date("d/m/Y") ?></p>

        <hr style="border-top: 1px solid black;">
        <div style="width: 100%; text-align: center;">
            <h1 style="max-width: 600px; margin: 0 auto;">Laporan Tahunan Keuangan YPP. Nurul Imamul Hasan</h1>
            <p style="text-align: center;">JL. Tegal Wangkal, RT. 05, RW. 01, Kampung KrajanDesa Dawuhan, Suboh, Krajan, Suboh, Situbondo, Kabupaten Situbondo, Jawa Timur 68354, Situbondo 68354</p>
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
                    <td>: <?= Helpers::formatRupiah($tahunan) ?> </td>
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
                    <td>: <?= Helpers::formatRupiah($totalTahunIni) ?> </td>
                </tr>
                <tr>
                    <td style="width: 600px;">Total Tabungan</td>
                    <td>: <?= Helpers::formatRupiah($totalTabungan) ?> </td>
                </tr>
            </table>
        </div>
        <hr style="border-top: 1px solid black;">
        <h1 style="margin-top: 1rem; margin-bottom:.5rem">Daftar Santri</h1>
        <table border="1" cellspacing="0" cellpadding="4" style="width: 100%; font-size: 14px; color: #333; border-collapse: collapse;">
            <thead>
                <tr>
                    <th rowspan="2" scope="col" class="p-4 w-10">No</th>
                    <th rowspan="2" scope="col" class="p-4 w-60">Nama</th>
                    <th colspan="12" scope="col" class="p-4" align="middle">Bulan</th>
                </tr>
                <tr>
                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                        <th class="w-10 p-2" style="width:50px"><?= $i ?></th>
                    <?php endfor; ?>
                </tr>
            </thead>
            <tbody>
                <?php $no  = 1; ?>
                <?php foreach ($santri as $s) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $s["nama"] ?></td>
                        <?php foreach ($s["data"] as $data) : ?>
                            <?php if ($data == 1 || $data === true) : ?>
                                <td align="middle" style="text-align: center;"> V </td>
                            <?php elseif ($data == 0 || $data === false) : ?>
                                <td align="middle" style="text-align: center;"> X </td>
                            <?php else : ?>
                                <td align="middle" style="text-align: center;"> </td>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </tr>
                    <?php $no++; ?>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php endif; ?>