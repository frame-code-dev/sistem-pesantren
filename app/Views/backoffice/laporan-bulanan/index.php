<?php

use App\Helpers\Helpers;

$this->extend('template/app') ?>

<?php
$currentMonth = date('n');
$currentYear = date("Y");

$months = [
	1 => "Januari",
	2 => "Februari",
	3 => "Maret",
	4 => "April",
	5 => "Mei",
	6 => "Juni",
	7 => "Juli",
	8 => "Agustus",
	9 => "September",
	10 => "Oktober",
	11 => "November",
	12 => "Desember"
];
$selectedMonth = $month['bulan'] ?? $currentMonth;

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
					Laporan Bulanan
				</h2>
			</div>

		</div>
		<div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
			<form action="" method="get" class="flex gap-2 items-end">
				<div class="w-full">
					<label for="year" class="block mb-2 text-sm font-semibold text-gray-900">Filter Laporan Bulanan<span class="me-2 text-red-500">*</span></label>
					<select id="bulan" name="bulan" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
						<option disabled hidden selected value=""> == Pilih Bulan == </option>
						<?php foreach ($months as $i => $namaBulan) : ?>
							<option value="<?= $i ?>" <?= $i == set_value("bulan", $selectedMonth) ? "selected" : "" ?>>
								<?= $namaBulan ?>
							</option>
						<?php endforeach; ?>
					</select>
					<div class="text-red-500 text-xs italic font-semibold">
						<?php if (session("validation.bulan")) : ?>
							<div class="text-red-500 text-sm">
								<?= session("validation.bulan") ?>
							</div>
						<?php endif ?>
					</div>
				</div>
				<div class="w-full">
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
						Bulan : <?= $months[$month] ?>
					</p>
					<p class="mb-3">
						Tahun : <?= $year ?>
					</p>
					<a href="<?= base_url("dashboard/laporan-bulanan-export?bulan=$month&year=$year") ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Download</a>
				</div>

				<div class="grid grid-cols-2 mt-6 mb-2">
					<div class="col-span-1">
						<p>Total Sudah membayar</p>
					</div>
					<div class="col-span-1">
						<p>: <?= $sudah_membayar ?> Transaksi</p>
					</div>
					<div class="col-span-1">
						<p>Total Belum membayar</p>
					</div>
					<div class="col-span-1">
						<p>: <?= $belum_membayar ?> Transaksi</p>
					</div>
				</div>
				<hr class="border ">
				<div class="grid grid-cols-2 mt-6 mb-2">
					<div class="col-span-1">
						<p>Total Syahriah</p>
					</div>
					<div class="col-span-1">
						<p>: <?= Helpers::formatRupiah($syariah) ?> </p>
					</div>
					<div class="col-span-1">
						<p>Pemasukan Lain</p>
					</div>
					<div class="col-span-1">
						<p>: <?= Helpers::formatRupiah($pemasukan_lain) ?> </p>
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
						<p>Total Bulan Ini</p>
					</div>
					<div class="col-span-1">
						<p>: <?= Helpers::formatRupiah($total) ?> </p>
					</div>
					<div class="col-span-1">
						<p>Total Tabungan</p>
					</div>
					<div class="col-span-1">
						<p>: <?= Helpers::formatRupiah($total_tabungan) ?> </p>
					</div>

				</div>
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