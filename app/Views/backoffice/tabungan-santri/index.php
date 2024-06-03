<?php

use App\Helpers\Helpers;

$this->extend('template/app') ?>


<?= $this->section('content') ?>

<div class="p-4 mt-14">
	<section class="p-5 overflow-y-auto mt-5">

		<div class="head lg:flex grid grid-cols-1 justify-between w-full">
			<div class="heading flex-auto">
				<p class="text-blue-950 font-sm text-xs">
					Pemasukan
				</p>
				<h2 class="font-bold tracking-tighter text-2xl text-theme-text">
					Tabungan Santri
				</h2>
			</div>

		</div>
		<div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
			<form action="" method="get" class="flex gap-2 items-end">
				<div class="w-full">
					<label for="santri" class="block mb-2 text-sm font-semibold text-gray-900">Filter Santri<span class="me-2 text-red-500">*</span></label>
					<select id="santri" name="santri" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
						<option disabled hidden selected value=""> == Pilih Santri == </option>

						<?php foreach ($santri as $str) : ?>
							<option <?= $str["id"] == $santriId  ? "selected" : "" ?> value="<?= $str["id"]  ?>"><?= $str["nama"] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Filter</button>
			</form>
		</div>
		<?php if ($filter) : ?>
			<div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
				<ul class="flex tab flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
					<li class="me-2">
						<button data-kategori="pemasukan" data-modalAddTitle="Tambah Pemasukan Santri" data-modalEditTitle="Ubah Pemasukan Santri" data-tabId="#pemasukan" class="tab-item inline-block px-4 py-3 text-white bg-blue-600 rounded-lg active" aria-current="page">Pemasukan</button>
					</li>
					<li class="me-2">
						<button data-kategori="pengeluaran" data-modalAddTitle="Tambah Pengeluaran Santri" data-modalEditTitle="Ubah Pengeluaran Santri" data-tabId="#pengeluaran" class="tab-item inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">Pengeluaran</button>
					</li>
					<li class="ms-auto">
						<button data-modal-target="tabungan-santri-modal" data-modal-toggle="tabungan-santri-modal" class=" inline-block px-4 py-3 text-white bg-blue-600 rounded-lg active" aria-current="page">Tambah Data</button>
					</li>
				</ul>
				<div id="pemasukan" class="tab-content p-6 mt-2  text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full">
					<table style="width: 100% !important;" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 datatable">
						<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
							<tr>
								<th scope="col" class=" px-4 py-3">No</th>
								<th scope="col" class="px-4 py-3">Nominal</th>
								<th scope="col" class="px-4 py-3">Tanggal</th>
								<th scope="col" class="px-4 py-3">
									<span class="sr-only">Actions</span>
								</th>
							</tr>
						</thead>

						<?php $no = 1; ?>
						<tbody>
							<?php foreach ($pemasukan as $pln) : ?>
								<tr>
									<td scope="row" class="px-2 py-2"><?= $no++ ?></td>
									<td scope="row" class="px-2 py-2"><?= Helpers::formatRupiah($pln["nominal"]) ?></td>
									<td scope="row" class="px-2 py-2"><?= Helpers::formatDate($pln["tanggal_bayar"]) ?></td>
									<td scope="row" class="px-2 py-2">
										<button data-modal-target="tabungan-santri-modal-edit" data-modal-toggle="tabungan-santri-modal-edit" data-nominal="<?= Helpers::formatRupiah($pln['nominal']) ?>" data-tanggal="<?= date("Y-m-d", strtotime($pln['tanggal_bayar'])) ?>" onclick="updateTabunganSantri('/dashboard/edit-tabungan-santri/<?= $pln['id'] ?>',this)" class=" inline-block px-4 py-3 text-white bg-green-600 rounded-lg active" aria-current="page">Ubah</button>
										<a href="<?= base_url("dashboard/tabungan-santri/$santriId/" . $pln['id'] . "/pemasukan") ?>" class=" inline-block px-4 py-3 text-white bg-green-600 rounded-lg active" aria-current="page">Cetak</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div id="pengeluaran" class="tab-content mt-2 hidden p-6  text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full">

					<table style="width: 100% !important;" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 datatable">
						<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
							<tr>
								<th scope="col" class=" px-4 py-3">No</th>
								<th scope="col" class="px-4 py-3">Nominal</th>
								<th scope="col" class="px-4 py-3">Tanggal</th>
								<th scope="col" class="px-4 py-3">
									<span class="sr-only">Actions</span>
								</th>
							</tr>
						</thead>

						<?php $no = 1; ?>
						<tbody>
							<?php foreach ($pengeluaran as $pln) : ?>
								<tr>
									<td scope="row" class="px-2 py-2"><?= $no++ ?></td>
									<td scope="row" class="px-2 py-2"><?= Helpers::formatRupiah($pln["nominal"]) ?></td>
									<td scope="row" class="px-2 py-2"><?= Helpers::formatDate($pln["tanggal_bayar"]) ?></td>
									<td scope="row" class="px-2 py-2">
										<button data-modal-target="tabungan-santri-modal-edit" data-modal-toggle="tabungan-santri-modal-edit" data-nominal="<?= Helpers::formatRupiah($pln['nominal']) ?>" data-tanggal="<?= date("Y-m-d", strtotime($pln['tanggal_bayar'])) ?>" onclick="updateTabunganSantri('/dashboard/edit-tabungan-santri/<?= $pln['id'] ?>',this)" class=" inline-block px-4 py-3 text-white bg-green-600 rounded-lg active" aria-current="page">Ubah</button>
										<a href="<?= base_url("dashboard/tabungan-santri/$santriId/" . $pln['id'] . "/pengeluaran") ?>" class=" inline-block px-4 py-3 text-white bg-green-600 rounded-lg active" aria-current="page">Cetak</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

		<?php endif; ?>
	</section>
</div>







<!-- Main modal -->
<div id="tabungan-santri-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
	<div class="relative p-4 w-full max-w-2xl max-h-full">
		<!-- Modal content -->
		<form action="<?= base_url("dashboard/add-tabungan-santri") ?>" method="post">
			<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
				<!-- Modal header -->
				<div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
					<h3 class="text-xl modal-title font-semibold text-gray-900 dark:text-white">
						Tambah Pemasukan Santri
					</h3>
					<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tabungan-santri-modal">
						<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
						</svg>
						<span class="sr-only">Close modal</span>
					</button>
				</div>
				<!-- Modal body -->
				<div class="p-4 md:p-5 space-y-4">
					<input type="hidden" name="kategori" value="pemasukan" id="">
					<input type="hidden" name="santri" value="<?= $santriId ?>" id="">
					<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nominal<span class="me-2 text-red-500">*</span></label>
					<input required type="text" placeholder="Masukkan Nominal" name="nominal" id="nominal" class="bg-gray-50 border border-gray-300 text-gray-900 rupiah text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
					<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Tanggal<span class="me-2 text-red-500">*</span></label>
					<input required type="date" name="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
				</div>
				<!-- Modal footer -->
				<div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
					<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
					<button data-modal-hide="tabungan-santri-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div id="tabungan-santri-modal-edit" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
	<div class="relative p-4 w-full max-w-2xl max-h-full">
		<!-- Modal content -->
		<form action="<?= base_url("dashboard/add-tabungan-santri") ?>" method="post">
			<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
				<!-- Modal header -->
				<div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
					<h3 class="text-xl modal-title font-semibold text-gray-900 dark:text-white">
						Ubah Pemasukan Santri
					</h3>
					<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tabungan-santri-modal-edit">
						<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
						</svg>
						<span class="sr-only">Close modal</span>
					</button>
				</div>
				<!-- Modal body -->
				<div class="p-4 md:p-5 space-y-4">
					<input type="hidden" name="kategori" value="pemasukan" id="">
					<input type="hidden" name="santri" value="<?= $santriId ?>" id="">
					<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nominal<span class="me-2 text-red-500">*</span></label>
					<input required type="text" placeholder="Masukkan Nominal" name="nominal" id="nominal" class="bg-gray-50 border border-gray-300 text-gray-900 rupiah text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
					<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Tanggal<span class="me-2 text-red-500">*</span></label>
					<input required type="date" name="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
				</div>
				<!-- Modal footer -->
				<div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
					<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
					<button data-modal-hide="tabungan-santri-modal-edit" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?= $this->endsection() ?>