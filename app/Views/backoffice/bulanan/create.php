<?php $this->extend('template/app') ?>
<?= $this->section('content') ?>
<?php
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
$year = date("Y"); ?>
<div class="p-4 mt-14">
	<section class="p-5 overflow-y-auto">
		<div class="head lg:flex grid grid-cols-1 justify-between w-full">
			<div class="heading flex-auto">
				<p class="text-blue-950 font-sm text-xs">
					<?= $title ?>
				</p>
				<h2 class="font-bold tracking-tighter text-2xl text-theme-text">
					<?= $current_page ?>
				</h2>
			</div>
			<div class="layout lg:flex grid grid-cols-1 lg:mt-0 mt-5 justify-end gap-5">
				<nav class="flex" aria-label="Breadcrumb">
					<ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
						<li class="inline-flex items-center">
							<a href="<?= base_url('dashboard') ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
								<svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
									<path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
								</svg>
								Dashboard
							</a>
						</li>
						<li>
							<div class="flex items-center">
								<svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
								</svg>
								<a href="<?= base_url('dashboard/user') ?>" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pemasukan</a>
							</div>
						</li>
						<li aria-current="page">
							<div class="flex items-center">
								<svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
								</svg>
								<span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Tambah data bulanan</span>
							</div>
						</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
			<form action="<?= base_url('dashboard/bulanan-post') ?>" method="POST" class="w-full mx-auto space-y-4" enctype="multipart/form-data">
				<div class="grid grid-cols-4 gap-3">
					<div class="col-span-2">
						<label for="santri" class="block mb-2 text-sm font-semibold text-gray-900">Santri<span class="me-2 text-red-500">*</span></label>
						<select id="santri" name="santri" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option disabled hidden selected value=""> == Pilih Santri == </option>
							<?php foreach ($santri as $row) : ?>
								<option <?= $row["id"] == set_value("santri") ? "selected" : "" ?> value="<?= $row['id'] ?> "> <?= $row['nama'] ?></option>
							<?php endforeach; ?>
						</select>
						<div class="text-red-500 text-xs italic font-semibold">
							<?php if (session("validation.santri")) : ?>
								<div class="text-red-500 text-sm">
									<?= session("validation.santri") ?>
								</div>
							<?php endif ?>
						</div>
					</div>
					<div class="col-span-2">
						<label for="bulan" class="block mb-2 text-sm font-semibold text-gray-900">Bulan<span class="me-2 text-red-500">*</span></label>
						<select id="bulan" name="bulan" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option disabled hidden selected value=""> == Pilih Bulan == </option>
							<?php for ($i = 1; $i <= 12; $i++) : ?>
								<option <?= $i == set_value("bulan") ? "selected" : "" ?> value="<?= $i ?>"> <?= $bulan[$i - 1] ?></option>
							<?php endfor; ?>
						</select>
						<div class="text-red-500 text-xs italic font-semibold">
							<?php if (session("validation.bulan")) : ?>
								<div class="text-red-500 text-sm">
									<?= session("validation.bulan") ?>
								</div>
							<?php endif ?>
						</div>
					</div>
					<div class="col-span-2">
						<label for="tahun" class="block mb-2 text-sm font-semibold text-gray-900">Tahun<span class="me-2 text-red-500">*</span></label>
						<select id="tahun" name="tahun" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
							<option disabled hidden selected value=""> == Pilih Tahun == </option>
							<?php for ($i = $year + 10; $i >= $year - 10; $i--) : ?>
								<option <?= $i == set_value("tahun", $year) ? "selected" : "" ?> value="<?= $i  ?>"><?= $i ?></option>
							<?php endfor; ?>
						</select>
						<div class="text-red-500 text-xs italic font-semibold">
							<?php if (session("validation.tahun")) : ?>
								<div class="text-red-500 text-sm">
									<?= session("validation.tahun") ?>
								</div>
							<?php endif ?>
						</div>
					</div>
					<div class="col-span-2">
						<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nominal<span class="me-2 text-red-500">*</span></label>
						<input type="text" value="<?= set_value("nominal") ?>" placeholder="Masukkan nominal pembayaran" name="nominal" id="nominal" class="rupiah bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
						<div class="text-red-500 text-xs italic font-semibold">
							<div class="text-red-500 text-xs italic font-semibold">
								<?php if (session("validation.nominal")) : ?>
									<div class="text-red-500 text-sm">
										<?= session("validation.nominal") ?>
									</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
				<div class="flex justify-end align-middle content-center bg-gray-100 p-3 rounded-md">
					<div>
						<button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Simpan</button>
					</div>
					<div>
						<button class="bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" type="reset">Batal</button>
					</div>

				</div>
			</form>
		</div>
	</section>
</div>

<?= $this->endsection() ?>