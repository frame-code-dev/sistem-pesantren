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
								Pendaftaran
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
									<a href="<?=base_url('pasien')?>" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white"><?=$current_page?></a>
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
					<div class="card bg-white p-5 mt-4 border rounded-md w-1/2 mx-auto text-center relative overflow-x-auto ">
						<div>
							<img src="<?php echo base_url(); ?>public/assets/logo-1.png" class="h-20 mx-auto" alt="FlowBite Logo" />
							<span class="self-center text-xl font-bold sm:text-2xl whitespace-nowrap dark:text-white">UPT Puskesmas Kalisat</span> <br>
							<span class="text-sm">Jalan M.Arifin No.3, Krajan II, Kalisat, Kec. Kalisat, Kabupaten Jember, Jawa Timur 68193</span>
						</div>
						<hr>
						<h1 class="font-bold sm:text-2xl text-xl mt-5">NOMOR ANTREAN</h1>
						<h1 class="mt-5 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><?=$nomor_antrian_hari_ini; ?></h1>
						<h4 class="font-bold sm:text-2xl text-xl mt-5">POLI UMUM</h4>
					</div>
					<div class="flex justify-center">
						<a href="<?=base_url('nomor_antrian/cetak/'.$pasien->id)?>" class="me-3 mt-5 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
							<svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z"/>
							</svg>
							Cetak No.Antrian
						</a>
						<a href="<?=base_url('nomor_antrian/cetak_kib/'.$pasien->id)?>" class="me-3 mt-5 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
							<svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z"/>
							</svg>
							Cetak KIB
						</a>
					</div>
				</section>
			</div>
		</div>
	</body>
	<?php $this->load->view("template/_partials/script") ?>
</html>
