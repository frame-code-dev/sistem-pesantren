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
				<div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-2 w-full mt-4">
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
									
								</h2>
								<p class="text-gray-500 text-sm tracking-tighter">
									Total 
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

									</h2>
									<p class="text-gray-500 text-sm tracking-tighter">
										Jumlah 
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
								
									</h2>
									<p class="text-gray-500 text-sm tracking-tighter">
										Total
									</p>
								</div>
							</div>
							<div>
								<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Belum Verifikasi</span>
							</div>
						</div>
					</div>
				</div>
				<div class="grid lg:grid-cols-1 md:grid-cols-1 grid-cols-1 gap-2 w-full mt-2">
					<div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
						<div class="head flex lg:flex-row flex-col justify-between gap-5 mb-2">
							<div class="title">
								<h2 class="font-semibold tracking-tighter text-lg text-theme-text">
									Persentase Jumlah Kunjungan
								</h2>
							</div>
						</div>
						<hr>
						<div class="lg:mt-0 pt-10 mx-auto">
							<div id="kunjungan"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
    </body>
   
	<?php $this->load->view("template/_partials/script") ?>
	<!-- <script>
		// Data kunjungan per bulan
        var kunjunganPerBulan = <?php echo json_encode($persentaseKunjungan); ?>;
		console.log(kunjunganPerBulan);
        // Mendapatkan label bulan
        var labels = Object.keys(kunjunganPerBulan);
        // Mendapatkan data kunjungan
        var data = Object.values(kunjunganPerBulan);
		console.log(data);
		var options = {
			series: [{
				name: 'Kunjungan',
				data:data
			}],
			chart: {
				type: 'bar',
				height: 350
			},
			plotOptions: {
				bar: {
					borderRadius: 4,
					borderRadiusApplication: 'end',
					horizontal: false,
				}
			},
			dataLabels: {
				enabled: false
			},
			xaxis: {
				categories: labels,
			}
		};

			var chart = new ApexCharts(document.querySelector("#kunjungan"), options);
			chart.render();
	</script> -->
</html>
