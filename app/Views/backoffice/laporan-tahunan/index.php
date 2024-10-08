<?php

use App\Helpers\Helpers;

$this->extend('template/app') ?>

<?php
$currentYear = date("Y");

?>
<?= $this->section('content') ?>

<div class="p-4 mt-14">
	<section class="p-5 overflow-y-auto mt-5">

		<div class="head lg:flex grid grid-cols-1 justify-between w-full">
			<div class="heading flex-auto">
				<p class="text-blue-950 font-sm text-xs">
					Laporan
				</p>
				<h2 class="font-bold tracking-tighter text-2xl text-theme-text">
					Laporan Tahunan
				</h2>
			</div>

		</div>
		<div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
			<form action="" method="get" class="flex gap-2 items-end">
				<div class="w-full">
					<label for="year" class="block mb-2 text-sm font-semibold text-gray-900">Filter Laporan Tahunan<span class="me-2 text-red-500">*</span></label>
					<select id="year" name="year" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
						<option disabled hidden selected value=""> == Pilih Tahun == </option>

						<?php foreach ($dataTahun as $tahun) : ?>
							<option <?= $tahun["tahun"] == ($year ?? $currentYear)  ? "selected" : "" ?> value="<?= $tahun["tahun"]  ?>"><?= $tahun["tahun"] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Filter</button>
			</form>
		</div>
		<?php if ($filter) : ?>
			<div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
				<div class="flex justify-between mb-2">
					<p class="mb-3">
						Tahun : <?= $year ?>
					</p>
					<a href="<?= base_url("dashboard/laporan-tahunan-export?year=$year") ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Download</a>
				</div>
				<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
					<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
						<tr>
							<th scope="col" class=" px-4 py-3">Status</th>
							<?php for ($i = 0; $i < 12; $i++) : ?>
								<th align="middle"><?= Helpers::getMontName($i) ?></th>
							<?php endfor; ?>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="py-3" scope="row">Sudah Membayar</td>
							<?php foreach ($sudahMembayar as $d) : ?>
								<td align="middle">
									<?= $d ?>
								</td>
							<?php endforeach; ?>
						</tr>
						<tr>
							<td class="py-3" scope="row">Belum Membayar</td>
							<?php foreach ($belumMembayar as $d) : ?>
								<td align="middle">
									<?= $d ?>
								</td>
							<?php endforeach; ?>
						</tr>
					</tbody>
				</table>

				<div class="grid grid-cols-2 mt-6 mb-2">
					<div class="col-span-1">
						<p>Total Sudah membayar</p>
					</div>
					<div class="col-span-1">
						<p>: <?= $totalSudahMembayar ?> Transaksi</p>
					</div>
					<div class="col-span-1">
						<p>Total Belum membayar</p>
					</div>
					<div class="col-span-1">
						<p>: <?= $totalBelumMembayar ?> Transaksi</p>
					</div>
				</div>
				<hr class="border ">
				<div class="grid grid-cols-2 mt-6 mb-2">
					<div class="col-span-1">
						<p>Total Syahriah</p>
					</div>
					<div class="col-span-1">
						<p>: <?= Helpers::formatRupiah($tahunan) ?> </p>
					</div>
					<div class="col-span-1">
						<p>Pemasukan Lain</p>
					</div>
					<div class="col-span-1">
						<p>: <?= Helpers::formatRupiah($pemasukanLain) ?> </p>
					</div>
					<div class="col-span-1">
						<p>Pengeluaran</p>
					</div>
					<div class="col-span-1">
						<p>: <?= Helpers::formatRupiah($pengeluaran) ?> </p>
					</div>
				</div>
				<hr class="border ">
				<div class="grid grid-cols-2 mt-6 mb-2">
					<div class="col-span-1">
						<p>Total Tahun Ini</p>
					</div>
					<div class="col-span-1">
						<p>: <?= Helpers::formatRupiah($totalTahunIni) ?> </p>
					</div>
					<div class="col-span-1">
						<p>Total Tabungan</p>
					</div>
					<div class="col-span-1">
						<p>: <?= Helpers::formatRupiah($totalTabungan) ?> </p>
					</div>

				</div>
				<hr class="border ">
				<h1 class="mt-4 mb-2">Daftar Santri</h1>
				<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
					<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
						<tr>
							<th rowspan="2" scope="col" class="p-4 w-10">No</th>
							<th rowspan="2" scope="col" class="p-4 w-60">Nama</th>
							<th colspan="12" scope="col" class="p-4" align="middle">Bulan</th>
						</tr>
						<tr>
							<?php for ($i = 1; $i <= 12; $i++) : ?>
								<th class="w-10 p-2"><?= $i ?></th>
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
										<td> ✅ </td>
									<?php elseif ($data == 0 || $data === false) : ?>
										<td> ❌ </td>
									<?php else : ?>
										<td> </td>
									<?php endif; ?>
								<?php endforeach; ?>

							</tr>
							<?php $no++; ?>

						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php endif; ?>
	</section>
</div>



<!-- 

<script>
	$(".hapus").click(function() {
		$("#deleteModal").modal("show")
	})
</script> -->

<?= $this->endsection() ?>