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
								Pemeriksaan
							</p>
							<h2 class="font-bold tracking-tighter text-2xl text-theme-text">
								<?=$title?>
							</h2>
						</div>
					</div>
					<div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatable">
							<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
								<tr>
									<th class="px-4 py-3">No</th>
									<th scope="col" class="px-4 py-3">No. RM</th>
									<th scope="col" class="px-4 py-3">NIK</th>
									<th scope="col" class="px-4 py-3">No. JKN</th>
									<th scope="col" class="px-4 py-3">Nama</th>
									<th scope="col" class="px-4 py-3">Tanggal Lahir</th>
									<th scope="col" class="px-4 py-3">JK</th>
									<th scope="col" class="px-4 py-3">Alamat</th>
									<th scope="col" class="px-4 py-3">
										<span class="sr-only">Actions</span>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data as $key => $item): ?>
									<tr class="border-b dark:border-gray-700">
										<td class="px-4 py-3"><?php echo $key + 1; ?></td>
										<td class="px-4 py-3"><?=ucwords($item->no_rm)?></td>
										<td class="px-4 py-3"><?=ucwords($item->nik)?></td>
										<td class="px-4 py-3"><?=$item->no_jkn != null ? $item->no_jkn : '-'?></td>
										<td class="px-4 py-3"><?=ucwords($item->name)?></td>
										<td class="px-4 py-3"><?=ucwords($item->tanggal_lahir)?></td>
										<td class="px-4 py-3">
                                            <?= $item->jenis_kelamin == 'l' ?
                                                'Laki-laki' : ($item->jenis_kelamin == 'p' ? 'Perempuan' : 'Tidak diketahui') ?>
                                        </td>
										<td class="px-4 py-3"><?=ucwords($item->alamat)?></td>
										<td class="px-4 py-3 flex items-center justify-end">
											<?php 
												// Check if a diagnosis exists for the current record
												$diagnosis_exists = $this->Rekam_model->is_diagnosis_exists($item->id);
												if (!$diagnosis_exists):
											?>
												<a href="<?= base_url('rekam-medis/create/'.$item->id) ?>" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
													Tambah Diagnosa
												</a>
											<?php else: ?>
												<span class="p-3 bg-green-100 text-green-800 rounded font-bold">Selesai Diagnosa</span>
											<?php endif; ?>
										</td>
											
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</section>
			</div>
		</div>
	</body>
	<?php $this->load->view("template/_partials/script") ?>

</html>
