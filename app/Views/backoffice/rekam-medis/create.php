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
								Rekam Medis
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
									<a href="<?=base_url('rekam-medis')?>" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white"><?=$current_page?></a>
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
						<div class="w-full bg-gray-100 p-3 rounded-md mb-5">
							<h4 class="font-bold text-sm">Data Pasien</h4>
							<hr>
						</div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
							<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
								<tr>
									<th scope="col" class="px-4 py-3">No. RM</th>
									<th scope="col" class="px-4 py-3">NIK</th>
									<th scope="col" class="px-4 py-3">No. JKN</th>
									<th scope="col" class="px-4 py-3">Nama</th>
									<th scope="col" class="px-4 py-3">Tanggal Lahir</th>
									<th scope="col" class="px-4 py-3">JK</th>
									<th scope="col" class="px-4 py-3">Alamat</th>
								</tr>
							</thead>
							<tbody>
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3"><?=ucwords($pasien->no_rm)?></td>
                                    <td class="px-4 py-3"><?=ucwords($pasien->nik)?></td>
                                    <td class="px-4 py-3"><?=$pasien->no_jkn != null ? $pasien->no_jkn : '-'?></td>
                                    <td class="px-4 py-3"><?=ucwords($pasien->name)?></td>
                                    <td class="px-4 py-3"><?=ucwords($pasien->tanggal_lahir)?></td>
                                    <td class="px-4 py-3">
                                        <?= $pasien->jenis_kelamin == 'l' ?
                                            'Laki-laki' : ($pasien->jenis_kelamin == 'p' ? 'Perempuan' : 'Tidak diketahui') ?>
                                    </td>
                                    <td class="px-4 py-3"><?=ucwords($pasien->alamat)?></td>
                                </tr>
							</tbody>
						</table>
					</div>
					<div class="grid grid-cols-2 gap-4">
						<div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
							<div class="w-full bg-gray-100 p-3 rounded-md mb-5">
								<h4 class="font-bold text-sm">Assesmen Awal</h4>
								<hr>
							</div>
							<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
								<tbody class="border p-4 w-full">
									<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
										<td width="20%" class="p-4">Keluhan Utama</td>
										<td width="1%">:</td>
										<td class="font-bold"><?=$data->keluhan_utama?></td>
									</tr>
								</tbody>
								<tbody class="border p-4 w-full">
									<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
										<td width="20%" class="p-4">Riwayat Penyakit Sekarang</td>
										<td width="1%">:</td>
										<td class="font-bold"><?=$data->riwayat_penyakit_sekarang?></td>
									</tr>
								</tbody>
								<tbody class="border p-4 w-full">
									<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
										<td width="20%" class="p-4">Riwayat Penyakit Dahulu</td>
										<td width="1%">:</td>
										<td class="font-bold"><?=$data->riwayat_penyakit_dahulu?></td>
									</tr>
								</tbody>
								<tbody class="border p-4 w-full">
									<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
										<td width="20%" class="p-4">Riwayat Pengobatan</td>
										<td width="1%">:</td>
										<td class="font-bold"><?=$data->riwayat_pengobatan?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
							<div class="w-full bg-gray-100 p-3 rounded-md mb-5">
								<h4 class="font-bold text-sm">Pemeriksaan Fisik</h4>
								<hr>
							</div>
							<div class="col-span-1 w-full">
								<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
									<tbody class="border p-4 w-full">
										<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
											<td width="20%" class="p-4">Tekanan Darah</td>
											<td width="1%">:</td>
											<td class="font-bold"><?=$data->tekanan_darah?> mmhg</td>
										</tr>
										<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
											<td width="20%" class="p-4">Nadi</td>
											<td width="1%">:</td>
											<td class="font-bold"><?=$data->nadi?> x/menit</td>
										</tr>
										<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
											<td width="20%" class="p-4">Suhu</td>
											<td width="1%">:</td>
											<td class="font-bold"><?=$data->suhu?>  C</td>
										</tr>
										<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
											<td width="20%" class="p-4">RR</td>
											<td width="1%">:</td>
											<td class="font-bold"><?=$data->rr?> x/menit</td>
										</tr>
										<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
											<td width="20%" class="p-4">Tinggi Badan</td>
											<td width="1%">:</td>
											<td class="font-bold"><?=$data->tinggi_badan?> cm</td>
										</tr>
										<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white border">
											<td width="20%" class="p-4">Berat Badan</td>
											<td width="1%">:</td>
											<td class="font-bold"><?=$data->berat_badan?> kg</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
						<div class="w-full bg-gray-100 p-3 rounded-md mb-5">
							<h4 class="font-bold text-sm">Diagnosa</h4>
							<hr>
						</div>
						<form action="<?=base_url('rekam-medis/store/'.$data->id)?>" class="w-full mx-auto space-y-4" method="POST" enctype="multipart/form-data">
							<input type="text" name="pemeriksaan_id" value="<?=$data->id?>" hidden>
							<div class="grid grid-cols-2 gap-3">
								<div class="col-span-2">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Kode Diagnosa<span class="me-2 text-red-500">*</span></label>
									<input type="text"  placeholder="Masukkan Kode Diagnosa" name="diganosa_utama_code" onkeyup="getDiagnosis()" id="diagnosa_utama_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
									<div class="text-red-500 text-xs italic font-semibold">
										<?= form_error('diganosa_utama_code') ?>
									</div>
									<div id="loadingMessage" class="text-blue-500 text-xs italic font-semibold" style="display: none;">
										Data sedang dimuat...
									</div>
								</div>
								<div class="col-span-2">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Deskripsi Diagnosa<span class="me-2 text-red-500">*</span></label>
									<input type="text"  placeholder="Masukkan Deskripsi Diagnosa" name="diganosa_utama_name" id="diagnosa_utama_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
									<div class="text-red-500 text-xs italic font-semibold">
										<?= form_error('diganosa_utama_name') ?>
									</div>
								</div>
								<div class="col-span-2">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Catatan Lain</label>
									<textarea id="message" rows="4" name="catatan" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
								</div>
								<div class="col-span-2">
									<div class="flex justify-between w-full bg-gray-100 p-3 rounded-md">
										<div>
											<h4 class="font-bold text-sm">Diagnosa Sekunder</h4>
											<hr>
										</div>
										<div>
											<button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"  id="panel_fields_button">
												<svg class="w-3.5 h-3.5 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
													<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
												</svg>
												Tambah
											
											</button>
										</div>
									</div>
									<div id="panel_fields" class="p-3 border">
	
									</div>
								</div>
								<div class="col-span-2">
									<div class="flex justify-between w-full bg-gray-100 p-3 rounded-md mb-5">
										<div>
											<h4 class="font-bold text-sm">Resep Obat</h4>
											<hr>
										</div>
										<div>
											<button type="button" 
													class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
													id="addBtn">
												<svg class="w-3.5 h-3.5 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
													<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
												</svg>
												Tambah
											
											</button>
										</div>
									</div>
									<div id="formContainer">
										<div class="row form-row my-3 grid grid-cols-4 content-center gap-3">
											<div class="form-group col-md-4">
												<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nama Obat<span class="me-2 text-red-500">*</span></label>
												<select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 obat-select" name="obat[]" required>
													<option value="">Pilih Obat</option>
													<?php foreach ($obat as $item): ?>
														<option value="<?= $item->id ?>"><?= $item->name ?></option>
													<?php endforeach; ?>
												
												</select>
											</div>
											<div class="form-group col-md-3">
												<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Frekuensi Obat<span class="me-2 text-red-500">*</span></label>
												<input type="text" placeholder="Masukkan Data" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="frekuensi[]">
											</div>
											<div class="form-group col-md-3">
												<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Qty<span class="me-2 text-red-500">*</span></label>
												<input type="number" placeholder="Masukkan Data" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 qty-input" name="qty[]" required min="1">
											</div>
											<div class="form-group col-md-2 flex align-bottom content-end items-end">
												<button type="button" class="bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 remove-btn">Hapus</button>
											</div>
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
		</div>
	</body>
	<?php $this->load->view("template/_partials/script") ?>
	<script>
        $(document).ready(function() {
            // Menambahkan form dinamis ketika tombol "Add Form" ditekan
            $('#addBtn').click(function() {
                var formRow = `
							<div class="row form-row my-3 grid grid-cols-4 content-center gap-3">
								<div class="form-group col-md-4">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nama Obat<span class="me-2 text-red-500">*</span></label>
									<select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 obat-select" name="obat[]" required>
										<option value="">Pilih Obat</option>
									</select>
								</div>
								<div class="form-group col-md-3">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Frekuensi Obat<span class="me-2 text-red-500">*</span></label>
									<input type="text" placeholder="Masukkan Data" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="frekuensi[]">
								</div>
								<div class="form-group col-md-3">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Qty<span class="me-2 text-red-500">*</span></label>
									<input type="number" placeholder="Masukkan Data" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 qty-input" name="qty[]" required min="1">
								</div>
								<div class="form-group col-md-2 flex align-bottom content-end items-end">
									<button type="button" class="bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 remove-btn">Hapus</button>
								</div>
							</div>
                `;

                $('#formContainer').append(formRow);

                // Mendapatkan data obat dan mengisi dropdown di form baru
				let url = `<?=base_url('rekam-medis/data-obat')?>`
                $.ajax({
                    url: url,
					dataType: 'json',
					success: function(response) {
						console.log(response);
						var obatSelect = $('.obat-select:last');
						obatSelect.empty();
						obatSelect.append('<option value="">Pilih Obat</option>');

						$.each(response, function(key, value) {
							obatSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
						});
					}
                });
            });

            // Menghapus form ketika tombol "Remove" ditekan
            $(document).on('click', '.remove-btn', function() {
                $(this).closest('.form-row').remove();
            });

        });
    </script>
	<script>
		function getDiagnosis(){
			var getCode = document.getElementById('diagnosa_utama_code').value;
			var getDesc = document.getElementById('diagnosa_utama_name');
			var loadingMessage = document.getElementById('loadingMessage');

			$.ajax({
				url: 'http://icd10api.com/?code='+getCode+'&desc=short&r=json',
				type: 'GET',
				dataType: 'JSON',
				beforeSend: function() {
					// Show the loading message before sending the request
					loadingMessage.style.display = 'block';
				},
				success: function(data){
					if (data.Response == 'False') {
						loadingMessage.style.display = 'block';
						
					}else{
						getDesc.value = data.Description;
						// Hide the loading message
						loadingMessage.style.display = 'none';
					}
				},
				error: function() {
					// Hide the loading message in case of error as well
					loadingMessage.style.display = 'none';
					// alert('Gagal mengambil data diagnosa.');
				}
			});
		}

		function getDiagnosisOther(that, number){
			var getCode = document.getElementById('code_diagnosis_other-'+number).value;
			var getDesc = document.getElementById('description_diagnosis_other-'+number);
			$.ajax({
				url: 'http://icd10api.com/?code='+getCode+'&desc=short&r=json',
				type: 'GET',
				dataType: 'JSON',
				success: function(data){
					console.log(data);
					getDesc.value = data.Description;
				}
			});
		}
		var room = 1;
		$('#panel_fields_button').click(function(){
			panel_fields()
		})
		function panel_fields(){
				room++;
				var objTo = document.getElementById('panel_fields');
				var divtest = document.createElement("div");
				divtest.setAttribute("class", "form-group removeclass"+room);
				var rdiv = 'removeclass'+room;
				divtest.innerHTML = `
				<div class="grid mt-5 grid-cols-2 gap-5 xl:grid-cols-1">
					<div>
						<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Kode Diagnosa Lainnya:<span class="me-2 text-red-500">*</span></label>
						<input required type="text" id="code_diagnosis_other-${room}" onkeyup="getDiagnosisOther(this, ${room})" name="code_diagnosis_other[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Kode Diagnosa Lainnya" value="">
						<span class="pl-1 text-xs text-red-600 text-bold"></span>
					</div>
					<div>
						<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Deskripsi Diagnosa Lainnya:<span class="me-2 text-red-500">*</span></label>
						<div class="flex">
							<div class="w-full">
								<input required type="text" id="description_diagnosis_other-${room}" name="description_diagnosis_other[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Deskripsi Diagnosa Lainnya" value="">
							</div>
							<div class="ms-2">
								<button type="button" class="bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" onclick="remove_panel_fields(${room})">Hapus</button>
							</div>
						</div>
					</div>
				</div>`;
				
				objTo.appendChild(divtest)
				
		}
		function remove_panel_fields(rid) {
			$('.removeclass'+rid).remove();
		}
	</script>
	<script>
	</script>
</html>
