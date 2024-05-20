
<!DOCTYPE html>
<html lang="">
    <head>
		<?php $this->load->view("template/_partials/head") ?>
    </head>
    <body class=" text-gray-900">
		
		<?php $this->load->view("template/_partials/topbar") ?>
		<?php $this->load->view("template/_partials/sidebar") ?>

		<div class="p-4 sm:ml-64">
			<div class="p-4 mt-14">
				<section class="p-5 overflow-y-auto">
					<div class="head lg:flex grid grid-cols-1 justify-between w-full">
						<div class="heading flex-auto">
							<p class="text-blue-950 font-sm text-xs">
								Apotek
							</p>
							<h2 class="font-bold tracking-tighter text-2xl text-theme-text">
								<?=$title?>
							</h2>
						</div>
						<div class="layout lg:flex grid grid-cols-1 lg:mt-0 mt-5 justify-end gap-5">
							<nav class="flex" aria-label="Breadcrumb">
								<ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
								<li class="inline-flex items-center">
									<a href="<?=base_url('dashboard')?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
									<svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
										<path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
									</svg>
									Dashboard
									</a>
								</li>
								<li>
									<div class="flex items-center">
									<svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
										<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
									</svg>
									<a href="<?=base_url('apotek')?>" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white"><?=$current_page?></a>
									</div>
								</li>
								<li aria-current="page">
									<div class="flex items-center">
									<svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
										<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
									</svg>
									<span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400"><?=$title?></span>
									</div>
								</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
						<form action="<?=base_url('apotek/store')?>" method="POST" class="w-full mx-auto mt-4 space-y-4" enctype="multipart/form-data">
                            <input type="hidden" name="rm_id" value="<?=$rm->id?>">
                            <input type="hidden" name="pemeriksaan_id" value="<?=$rm->pemeriksaan_id?>">
                            <div class="mt-5">
                                <b>Data Pasien</b>
                            </div>
							<div class="grid grid-cols-2 gap-3">
								<div class="">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">No Rekam Medis</label>
									<input type="text" placeholder="Masukkan disini..." name="no_rm" id="no_rm" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?=$rm->no_rm?>" disabled>
									<div class="text-red-500 text-xs italic font-semibold">
										<?= form_error('no_rm') ?>
									</div>
								</div>
								<div class="">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nomor Induk Kependudukan</label>
									<input type="text" placeholder="Masukkan disini..." name="nik" id="nik" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?=$rm->nik?>" disabled>
									<div class="text-red-500 text-xs italic font-semibold">
										<?= form_error('nik') ?>
									</div>
								</div>
                                <div class="">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Jenis Pasien</label>
									<input type="text" placeholder="Masukkan disini..." name="jenis_pasien" id="jenis_pasien" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?=$rm->jenis_pasien?>" disabled>
									<div class="text-red-500 text-xs italic font-semibold">
										<?= form_error('jenis_pasien') ?>
									</div>
								</div>
								<?php if ($rm->jenis_pasien == 'bpjs') :?>
                                    <div class="">
                                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nomor Kartu JKN</label>
                                        <input type="text" placeholder="Masukkan disini..." name="no_jkn" id="no_jkn" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?=$rm->no_jkn?>" disabled>
                                        <div class="text-red-500 text-xs italic font-semibold">
                                            <?= form_error('no_jkn') ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="">
                                    <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nama</label>
                                    <input type="text" placeholder="Masukkan disini..." name="nama" id="nama" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?=$rm->name?>" disabled>
                                    <div class="text-red-500 text-xs italic font-semibold">
                                        <?= form_error('nama') ?>
                                    </div>
                                </div>
                                <div class="">
                                    <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Tanggal Lahir</label>
                                    <input type="text" placeholder="Masukkan disini..." name="tanggal_lahir" id="tanggal_lahir" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?=date('d-m-Y', strtotime($rm->tanggal_lahir))?>" disabled>
                                    <div class="text-red-500 text-xs italic font-semibold">
                                        <?= form_error('tanggal_lahir') ?>
                                    </div>
                                </div>
                                <div class="">
                                    <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Jenis Kelamin</label>
                                    <input type="text" placeholder="Masukkan disini..." name="jenis_kelamin" id="jenis_kelamin" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= $rm->jenis_kelamin == 'l' ? 'Laki-laki' : ($rm->jenis_kelamin == 'p' ? 'Perempuan' : 'Tidak diketahui') ?>" disabled>
                                    <div class="text-red-500 text-xs italic font-semibold">
                                        <?= form_error('jenis_kelamin') ?>
                                    </div>
                                </div>
							</div>
                            <hr>
                            <div class="mt-5">
                                <b>Obat</b>
                            </div>
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">No</th>
                                        <th scope="col" class="px-4 py-3">Obat</th>
                                        <th scope="col" class="px-4 py-3">Qty</th>
                                        <th scope="col" class="px-4 py-3">Frekuensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($obat as $key => $item) : ?>
                                        <tr class="border-b dark:border-gray-700">
                                            <input type="hidden" name="obat_id[]" value="<?=$item->id?>">
                                            <input type="hidden" name="qty[]" value="<?=$item->qty?>">
                                            <td class="px-4 py-3"><?php echo $key + 1; ?></td>
                                            <td class="px-4 py-3"><?=ucwords($item->name)?></td>
                                            <td class="px-4 py-3"><?=ucwords($item->qty)?></td>
                                            <td class="px-4 py-3"><?=ucwords($item->frekuensi)?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
		</div>
	</body>
	<?php $this->load->view("template/_partials/script") ?>

</html>
