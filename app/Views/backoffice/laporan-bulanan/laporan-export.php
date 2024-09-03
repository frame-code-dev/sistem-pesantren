<?php

use App\Helpers\Helpers;

if ($filter) : ?>

    <div style="background-color: white; width: 100%; overflow-x: auto;">
        <p style="text-align: right; width: 100%;"><?= date("d/m/Y") ?></p>

        <hr style="border-top: 1px solid black;">
        <div style="width: 100%; text-align: center;">
            <h1 style="max-width: 600px; margin: 0 auto;">Laporan Bulanan Keuangan YPP. Nurul Imamul Hasan</h1>
            <p style="text-align: center;">JL. Tegal Wangkal, RT. 05, RW. 01, Kampung KrajanDesa Dawuhan, Suboh, Krajan, Suboh, Situbondo, Kabupaten Situbondo, Jawa Timur 68354, Situbondo 68354</p>
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
        <hr style="border-top: 1px solid black;">
        <br>
        <br>
        <br>
        <br>
        <h1 style="margin-top: 1rem; margin-bottom:.5rem">Daftar Santri</h1>
        <table border="1" cellspacing="0" cellpadding="4" style="width: 100%; font-size: 14px; color: #333; border-collapse: collapse;">
            <thead>
                <tr>
                    <th scope="col" class="p-4 w-10">No</th>
                    <th scope="col" class="p-4 w-auto">Nama</th>
                    <th class=" p-2">Bulan <?= $month ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $no  = 1; ?>
                <?php foreach ($santri as $s) : ?>
                    <tr>
                        <td align="middle" style="text-align: center;"><?= $no ?></td>
                        <td><?= $s["nama"] ?></td>
                        <?php if ($s["sudahBayar"]) : ?>
                            <td style="text-align: center;"> V </td>
                        <?php else : ?>
                            <td style="text-align: center;"> X </td>
                        <?php endif; ?>

                    </tr>
                    <?php $no++; ?>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php endif; ?>