<?php

use App\Helpers\Helpers;

$this->extend('template/app') ?>

<?= $this->section('content') ?>
<div class="p-4 mt-14">
	<?php
	$session = \Config\Services::session();
	$role = $session->get('role');
	?>
	<!-- dashboard PSB -->
	<?php if ($role == 'super_admin' || $role == 'admin_santri') : ?>
		<div class="p-3 bg-gray-100 rounded border ">
			<h1 class="text-lg font-bold">Dashboard PSB </h1>
			<hr>
		</div>
		<div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-2 w-full mt-4">
			<div class="card p-5 w-full border bg-white h-[127px] relative">
				<div class="flex gap-5">
					<div>
						<button class="w-20 h-20 p-5 rounded-full bg-blue-100 flex align-middle items-center content-center mx-auto">
							<svg class="text-3xl mt-1 text-blue-500 items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
							</svg>
						</button>
					</div>
					<div class="mt-3">
						<h2 class="text-theme-text text-3xl font-bold tracking-tighter">
							<?= $total_santri ?>
						</h2>
						<p class="text-gray-500 text-sm tracking-tighter">
							Total Santri
						</p>
					</div>
				</div>
			</div>
			<div class="card p-5 w-full border bg-white h-[127px] relative">
				<div class="flex gap-5">
					<div>
						<button class="w-20 h-20 p-5 rounded-full bg-red-100 flex align-middle items-center content-center mx-auto">
							<svg class="text-3xl mt-1 text-red-500 items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
							</svg>
						</button>
					</div>
					<div class="mt-3">
						<h2 class="text-theme-text text-3xl font-bold tracking-tighter">
							<?= $total_alumni ?>
						</h2>
						<p class="text-gray-500 text-sm tracking-tighter">
							Total Alumni
						</p>
					</div>
				</div>
			</div>
			<div class="card p-5 w-full border bg-white h-[127px] relative">
				<div class="flex gap-5 justify-between">
					<div class="flex gap-5">
						<div>
							<button class="w-20 h-20 p-5 rounded-full bg-purple-100 flex align-middle items-center content-center mx-auto">
								<svg class="text-3xl mt-1 text-purple-500 items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7h1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
								</svg>
							</button>
						</div>
						<div class="mt-3">
							<h2 class="text-theme-text text-3xl font-bold tracking-tighter">
								<?= $total_berita ?>
							</h2>
							<p class="text-gray-500 text-sm tracking-tighter">
								Total Berita
							</p>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="grid lg:grid-cols-2 md:grid-cols-1 grid-cols-1 gap-2 w-full mt-2">
			<div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
				<div class="head flex lg:flex-row flex-col justify-between gap-5 mb-2">
					<div class="title">
						<h2 class="font-semibold tracking-tighter text-lg text-theme-text">
							Persentase Santri Aktif & Alumni
						</h2>
					</div>
				</div>
				<hr>
				<div class="lg:mt-0 pt-10 mx-auto">
					<div id="aktif-alumni"></div>
				</div>
			</div>
			<div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
				<div class="head flex lg:flex-row flex-col justify-between gap-5 mb-2">
					<div class="title">
						<h2 class="font-semibold tracking-tighter text-lg text-theme-text">
							Persentase Santri
						</h2>
					</div>
				</div>
				<hr>
				<div class="lg:mt-0 pt-10 mx-auto">
					<div id="santri-gender"></div>
				</div>

			</div>
		</div>
	<?php endif; ?>
	<?php if ($role == 'super_admin' || $role == 'admin_keuangan') : ?>
		<!-- dashboard keuangan -->
		<div class="p-3 bg-gray-100 rounded border mt-4">
			<h1 class="text-lg font-bold">Dashboard Keuangan</h1>
			<hr>
		</div>
		<div class="grid grid-cols-3 gap-3 mt-4">
			<div class="card p-5 w-full border bg-white h-[127px] relative">
				<div class="flex gap-5 justify-between">
					<div class="flex gap-5">
						<div>
							<button class="w-20 h-20 p-5 rounded-full bg-green-100 flex align-middle items-center content-center mx-auto">
								<svg class="text-3xl mt-1 text-green-500 items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 7 2 2 4-4m-5-9v4h4V3h-4Z" />
								</svg>
							</button>
						</div>
						<div class="mt-3">
							<h2 class="text-theme-text text-3xl font-bold tracking-tighter">
								<?= Helpers::formatRupiah($total_pendaftaran->nominal ?? 0) ?>
							</h2>
							<p class="text-gray-500 text-sm tracking-tighter">
								Total Pendaftaran
							</p>
						</div>
					</div>

				</div>
			</div>
			<div class="card p-5 w-full border bg-white h-[127px] relative">
				<div class="flex gap-5 justify-between">
					<div class="flex gap-5">
						<div>
							<button class="w-20 h-20 p-5 rounded-full bg-blue-100 flex align-middle items-center content-center mx-auto">
								<svg class="text-3xl mt-1 text-blue-500 items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 7 2 2 4-4m-5-9v4h4V3h-4Z" />
								</svg>
							</button>
						</div>
						<div class="mt-3">
							<h2 class="text-theme-text text-3xl font-bold tracking-tighter">
								<?= Helpers::formatRupiah($total_pendaftaran_ulang->nominal ?? 0) ?>

							</h2>
							<p class="text-gray-500 text-sm tracking-tighter">
								Total Pendaftaran Ulang
							</p>
						</div>
					</div>

				</div>
			</div>
			<div class="card p-5 w-full border bg-white h-[127px] relative">
				<div class="flex gap-5 justify-between">
					<div class="flex gap-5">
						<div>
							<button class="w-20 h-20 p-5 rounded-full bg-red-100 flex align-middle items-center content-center mx-auto">
								<svg class="text-3xl mt-1 text-red-500 items-center content-center mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 7 2 2 4-4m-5-9v4h4V3h-4Z" />
								</svg>
							</button>
						</div>
						<div class="mt-3">
							<h2 class="text-theme-text text-3xl font-bold tracking-tighter">
								<?= Helpers::formatRupiah($total_pengeluaran->nominal ?? 0) ?>
							</h2>
							<p class="text-gray-500 text-sm tracking-tighter">
								Total Pengeluaran Pesantren
							</p>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="grid lg:grid-cols-2 md:grid-cols-1 grid-cols-1 gap-2 w-full mt-2">
			<div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
				<div class="head flex lg:flex-row flex-col justify-between gap-5 mb-2">
					<div class="title">
						<h2 class="font-semibold tracking-tighter text-lg text-theme-text">
							Persentase Pendaftaran & Pendaftaran Ulang
						</h2>
					</div>
				</div>
				<hr>
				<div class="lg:mt-0 pt-10 mx-auto">
					<div id="pendaftaran"></div>
				</div>

			</div>
			<div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
				<div class="head flex lg:flex-row flex-col justify-between gap-5 mb-2">
					<div class="title">
						<h2 class="font-semibold tracking-tighter text-lg text-theme-text">
							Persentase Pemasukan Dan Pengeluaran Pesantren
						</h2>
					</div>
				</div>
				<hr>
				<div class="lg:mt-0 pt-10 mx-auto">
					<div id="pemasukan"></div>
				</div>

			</div>
		</div>
	<?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
	// santri aktif-alumni 
	var aktif_alumni = {
		series: [{
			name: 'Santri Aktif',
			data: [
				<?php foreach ($santri_aktif['data_aktif'] as $key => $value) { ?>
					<?= $value ?>,
				<?php } ?>
			]
		}, {
			name: 'Alumni',
			data: [
				<?php foreach ($santri_aktif['data_alumni'] as $key => $value) { ?>
					<?= $value ?>,
				<?php } ?>
			]
		}],
		chart: {
			height: 350,
			type: 'area'
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			curve: 'smooth'
		},
		xaxis: {
			type: 'datetime',
			categories: [
				<?php foreach ($santri_aktif['categories'] as $key => $value) { ?> "<?= $value ?>",
				<?php } ?>
			]
		},
		tooltip: {
			x: {
				format: 'dd/MM/yy HH:mm'
			},
		},
	};

	var chart_aktif_alumni = new ApexCharts(document.querySelector("#aktif-alumni"), aktif_alumni);
	chart_aktif_alumni.render();

	// aktif jenis kelamin
	var dataGender = <?php echo json_encode($gender_santri); ?>;

	var lakiLaki = parseInt(dataGender['laki-laki']);
	var perempuan = parseInt(dataGender['perempuan']);

	var aktif = {
		series: [lakiLaki, perempuan],
		chart: {
			width: 500,
			type: 'pie'
		},
		labels: ['Laki-Laki', 'Perempuan'],
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					width: 500
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};

	var chart = new ApexCharts(document.querySelector("#santri-gender"), aktif);
	chart.render();


	// pendaftaran
	var pendaftaran = {
		series: [{
			name: 'Pendaftaran',
			data: <?= json_encode(array_values($getChartPendaftaran["pendaftaran"])) ?>
		}, {
			name: 'Pendaftaran Ulang',
			data: <?= json_encode(array_values($getChartPendaftaran["pendaftaranUlang"])) ?>
		}],
		chart: {
			height: 350,
			type: 'area'
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			curve: 'smooth'
		},
		// xaxis: {
		// 	type: 'datetime',
		// 	categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
		// },
		tooltip: {
			x: {
				format: 'dd/MM/yy HH:mm'
			},
		},
	};

	var chart_pendaftaran = new ApexCharts(document.querySelector("#pendaftaran"), pendaftaran);
	chart_pendaftaran.render();
	// pemasukan
	var pemasukan = {
		series: [{
				name: 'Pemasukan',
				data: <?= json_encode(array_values($getChartPemasukanPengeluaran["pemasukan"])) ?>
			},
			{
				name: 'Pengeluaran',
				data: <?= json_encode(array_values($getChartPemasukanPengeluaran["pengeluaran"])) ?>
			}
		],
		chart: {
			height: 350,
			type: 'area',
		},
		colors: ["#2a9d8f", "#FF0000"],
		dataLabels: {
			enabled: false,

		},
		stroke: {
			curve: 'smooth'
		},
		// xaxis: {
		// 	type: 'datetime',
		// 	categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
		// },
		tooltip: {
			x: {
				format: 'dd/MM/yy HH:mm'
			},
		},
	};

	var chart_pemasukan = new ApexCharts(document.querySelector("#pemasukan"), pemasukan);
	chart_pemasukan.render();
</script>
<?= $this->endsection() ?>