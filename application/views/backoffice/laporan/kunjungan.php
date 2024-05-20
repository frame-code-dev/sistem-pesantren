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
				<section class="p-5 overflow-y-auto mt-5">
					<div class="head lg:flex grid grid-cols-1 justify-between w-full">
						<div class="heading flex-auto">
							<p class="text-blue-950 font-sm text-xs">
								Laporan
							</p>
							<h2 class="font-bold tracking-tighter text-2xl text-theme-text">
								<?=$title?>
							</h2>
						</div>
					</div>
					<div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
                        <b>Filter</b>
                        <form action="" method="get" class="w-full mx-auto space-y-4" enctype="multipart/form-data">
                            <div class="grid grid-cols-2 gap-3">
                                <div class="">
                                    <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Dari<span class="me-2 text-red-500">*</span></label>
                                    <input type="text" placeholder="d-m-Y" name="dari" id="dari" datepicker datepicker-format="dd-mm-yyyy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?=isset($_GET['dari']) ? $_GET['dari'] : ''?>" autocomplete="off">
                                    <div class="text-red-500 text-xs italic font-semibold">
                                        <?= form_error('dari') ?>
                                    </div>
                                </div>
                                <div class="">
                                    <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Sampai<span class="me-2 text-red-500">*</span></label>
                                    <input type="text" placeholder="d-m-Y" name="sampai" id="sampai" datepicker datepicker-format="dd-mm-yyyy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?=isset($_GET['sampai']) ? $_GET['sampai'] : ''?>" autocomplete="off">
                                    <div class="text-red-500 text-xs italic font-semibold">
                                        <?= form_error('sampai') ?>
                                    </div>
                                </div>
                                <div class="">
                                    <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Semua</option>
                                        <option value="l" <?=isset($_GET['jenis_kelamin']) ? ($_GET['jenis_kelamin'] == 'l' ? 'selected' : '') : '' ?> >Laki-Laki</option>
                                        <option value="p" <?=isset($_GET['jenis_kelamin']) ? ($_GET['jenis_kelamin'] == 'p' ? 'selected' : '') : '' ?> >Perempuan</option>
                                    </select>
                                    <div class="text-red-500 text-xs italic font-semibold">
                                        <?= form_error('jenis_kelamin') ?>
                                    </div>
                                </div>
                                <div class="">
                                    <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Jenis Pasien</label>
                                    <select id="jenis_pasien" name="jenis_pasien" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Semua</option>
                                        <option value="bpjs" <?=isset($_GET['jenis_pasien']) ? ($_GET['jenis_pasien'] == 'bpjs' ? 'selected' : '') : '' ?> >BPJS</option>
                                        <option value="umum" <?=isset($_GET['jenis_pasien']) ? ($_GET['jenis_pasien'] == 'umum' ? 'selected' : '') : '' ?> >Umum</option>
                                    </select>
                                    <div class="text-red-500 text-xs italic font-semibold">
                                        <?= form_error('jenis_pasien') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end align-middle content-center bg-gray-100 p-3 rounded-md">
                                <?php if (count($data) > 0): ?>
                                    <div>
                                        <a href="" class="bg-white text-yellow-400 hover:text-yellow-600 border border-yellow-400 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-500 dark:text-yellow-500 dark:hover:text-white dark:hover:bg-yellow-600 dark:focus:ring-yellow-900" type="button">Cetak</a>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Tampilkan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if (count($data) > 0): ?>
                        <div class="card bg-white p-5 mt-5 border rounded-md w-full relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatable">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th class="px-4 py-3">No</th>
                                        <th scope="col" class="px-4 py-3">Tanggal Kunjungan</th>
                                        <th scope="col" class="px-4 py-3">No. RM</th>
                                        <th scope="col" class="px-4 py-3">Jenis Pasien</th>
                                        <th scope="col" class="px-4 py-3">Nama</th>
                                        <th scope="col" class="px-4 py-3">Tanggal Lahir</th>
                                        <th scope="col" class="px-4 py-3">JK</th>
                                        <th scope="col" class="px-4 py-3">Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $item): ?>
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="px-4 py-3"><?php echo $key + 1; ?></td>
                                            <td class="px-4 py-3"><?=date('d-m-Y', strtotime($item->created_at))?></td>
                                            <td class="px-4 py-3"><?=ucwords($item->no_rm)?></td>
                                            <td class="px-4 py-3"><?=ucwords($item->jenis_pasien)?></td>
                                            <td class="px-4 py-3"><?=ucwords($item->name)?></td>
                                            <td class="px-4 py-3"><?=ucwords($item->tanggal_lahir)?></td>
                                            <td class="px-4 py-3">
                                                <?= $item->jenis_kelamin == 'l' ?
                                                    'Laki-laki' : ($item->jenis_kelamin == 'p' ? 'Perempuan' : 'Tidak diketahui') ?>
                                            </td>
                                            <td class="px-4 py-3"><?=ucwords($item->alamat)?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
				</section>
			</div>
		</div>
	</body>
	<?php $this->load->view("template/_partials/script") ?>

</html>
