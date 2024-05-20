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
								Pendaftaran
							</p>
							<h2 class="font-bold tracking-tighter text-2xl text-theme-text">
								<?=$title?>
							</h2>
						</div>
						<div class="layout lg:flex grid grid-cols-1 lg:mt-0 mt-5 justify-end gap-5">
							<div class="button-wrapper gap-2 flex lg:justify-end">
								<a href="<?=base_url('pasien/create')?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
									<svg class="w-3.5 h-3.5 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
										<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
									</svg>
									Tambah Data</a>
							</div>
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
									<th scope="col" class="px-4 py-3">Alamat</th>
									<th scope="col" class="px-4 py-3">Pendaftaran</th>
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
										<td class="px-4 py-3"><?=ucwords($item->alamat)?></td>
										<td class="px-4 py-3">
											<a href="<?=base_url('nomor_antrian/daftar-pasien-lama/'.$item->id)?>" class="me-3 mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
											<svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
												<path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z"/>
											</svg>
											Pendaftaran Pasien Lama</a> 
											
										</td>
										<td class="px-4 py-3 flex items-center justify-end">
											<button id="<?=$item->id?>-button" data-dropdown-toggle="<?=$item->id?>-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
												<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
													<path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
												</svg>
											</button>
											<div id="<?=$item->id?>-dropdown" class="hidden z-50 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
												<ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="<?=$item->id?>-button">
													<li>
														<a href="<?=base_url('pasien/edit/'.$item->id)?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white edit-data">Edit</a>
													</li>
													<li>
														<a href="#" onclick="deleteConfirm('<?php echo base_url('pasien/delete/'.$item->id) ?>')" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
													</li>
												</ul>
											</div>
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
