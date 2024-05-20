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
								Master Data
							</p>
							<h2 class="font-bold tracking-tighter text-2xl text-theme-text">
								Data User
							</h2>
						</div>
						<div class="layout lg:flex grid grid-cols-1 lg:mt-0 mt-5 justify-end gap-5">
							<div class="button-wrapper gap-2 flex lg:justify-end">
								<a href="<?=base_url('user/create')?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
									<svg class="w-3.5 h-3.5 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
										<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
									</svg>
									Tambah Data</a>
							</div>
						</div>
					</div>
					<div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-2 w-full mt-4">
						<div class="card p-5 w-full border bg-white h-[127px] relative">
							<div class="flex gap-5">
								<div>
									<button class="w-20 h-20 p-5 rounded-full bg-blue-100 flex align-middle items-center content-center mx-auto">
										<svg class="text-3xl mt-1 text-blue-500 items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
											<path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
										</svg>
									</button>
								</div>
								<div class="mt-3">
									<h2 class="text-theme-text text-3xl font-bold tracking-tighter">
										<?=$count_doctor?>
									</h2>
									<p class="text-gray-500 text-sm tracking-tighter">
										Pengguna Dokter
									</p>
								</div>
							</div>
						</div>
						<div class="card p-5 w-full border bg-white h-[127px] relative">
							<div class="flex gap-5 justify-between">
								<div class="flex gap-5">
									<div>
										<button class="w-20 h-20 p-5 rounded-full bg-green-100 flex align-middle items-center content-center mx-auto">
											<svg class="text-3xl mt-1 text-green-500 items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
												<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 7 2 2 4-4m-5-9v4h4V3h-4Z"/>
											</svg>
										</button>
									</div>
									<div class="mt-3">
										<h2 class="text-theme-text text-3xl font-bold tracking-tighter">
										<?=$count_perawat?>
										</h2>
										<p class="text-gray-500 text-sm tracking-tighter">
											Pengguna Perawat
										</p>
									</div>
								</div>
								
							</div>
						</div>
						<div class="card p-5 w-full border bg-white h-[127px] relative">
							<div class="flex gap-5 justify-between">
								<div class="flex gap-5">
									<div>
										<button class="w-20 h-20 p-5 rounded-full bg-purple-100 flex align-middle items-center content-center mx-auto">
											<svg class="text-3xl mt-1 text-purple-500 items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
												<path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
											</svg>
										</button>
									</div>
									<div class="mt-3">
										<h2 class="text-theme-text text-3xl font-bold tracking-tighter">
											<?=$count_admin?>
										</h2>
										<p class="text-gray-500 text-sm tracking-tighter">
											Pengguna Admin
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="card p-5 w-full border bg-white h-[127px] relative">
							<div class="flex gap-5 justify-between">
								<div class="flex gap-5">
									<div>
										<button class="w-20 h-20 p-5 rounded-full bg-purple-100 flex align-middle items-center content-center mx-auto">
											<svg class="text-3xl mt-1 text-purple-500 items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
												<path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
											</svg>
										</button>
									</div>
									<div class="mt-3">
										<h2 class="text-theme-text text-3xl font-bold tracking-tighter">
											<?=$count_rm?>
										</h2>
										<p class="text-gray-500 text-sm tracking-tighter">
											Pengguna RM
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
						<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatable">
							<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
								<tr>
									<th class="px-4 py-3">No</th>
									<th scope="col" class="px-4 py-3">Nama</th>
									<th scope="col" class="px-4 py-3">Username</th>
									<th scope="col" class="px-4 py-3">HakAkses</th>
									<th scope="col" class="px-4 py-3">
										<span class="sr-only">Actions</span>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data as $key => $item): ?>
									<tr class="border-b dark:border-gray-700">
										<td class="px-4 py-3"><?php echo $key + 1; ?></td>
										<td class="px-4 py-3"><?=ucwords($item->nama)?></td>
										<td class="px-4 py-3"><?=ucwords($item->username)?></td>
										<td class="px-4 py-3"><?=ucwords($item->role)?></td>
										<td class="px-4 py-3 flex items-center justify-end">
											<button id="<?=$item->id?>-button" data-dropdown-toggle="<?=$item->id?>-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
												<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
													<path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
												</svg>
											</button>
											<div id="<?=$item->id?>-dropdown" class="hidden z-50 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
												<ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="<?=$item->id?>-button">
													<li>
														<a href="<?=base_url('user/edit/'.$item->id)?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white edit-data">Edit</a>
													</li>
													<li>
														<a href="#" onclick="deleteConfirm('<?php echo base_url('user/delete/'.$item->id) ?>')" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
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
