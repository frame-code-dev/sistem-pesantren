
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
					<div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
						<form action="<?=base_url('pasien/update/'.$data->id)?>" method="POST" class="w-full mx-auto space-y-4" enctype="multipart/form-data">
							<div class="grid grid-cols-3 gap-3">
								<div class="col-span-3">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">No. Rekam Medis<span class="me-2 text-red-500">*</span></label>
									<input type="text" value="<?=$data->no_rm?>" readonly placeholder="Masukkan No. Rekam Medis" name="no_rm" id="no_rm" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
									<div class="text-red-500 text-xs italic font-semibold">
										<?= form_error('no_rm') ?>
									</div>
								</div>
								<div class="col-span-3">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nomor Induk Kependudukan<span class="me-2 text-red-500">*</span></label>
									<input type="text" value="<?=$data->nik?>" placeholder="Masukkan NIK" name="nik" id="nik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
									<div class="text-red-500 text-xs italic font-semibold">
										<?= form_error('nik') ?>
									</div>
								</div>
								<div class="col-span-3">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nomor Kartu Keluarga<span class="me-2 text-red-500">*</span></label>
									<input type="text" placeholder="Masukkan KK" value="<?=$data->no_kk?>" name="no_kk" id="no_kk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
									<div class="text-red-500 text-xs italic font-semibold">
										<?= form_error('no_kk') ?>
									</div>
								</div>
								<div class="col-span-3">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nama Pasien<span class="me-2 text-red-500">*</span></label>
									<input type="text" placeholder="Masukkan Nama Pasien" value="<?=$data->name?>" name="nama_pasien" id="nama_pasien" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
									<div class="text-red-500 text-xs italic font-semibold">
										<?= form_error('nama_pasien') ?>
									</div>
								</div>
								<div class="col-span-1">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Jenis Pasien<span class="me-2 text-red-500">*</span></label>
									<select id="jenis_pasien" name="jenis_pasien" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
										<option value="" >Pilih Jenis Pasien</option>
										<option value="bpjs" <?=$data->jenis_pasien == 'bpjs' ? 'selected' : ''?> >BPJS</option>
										<option value="umum" <?=$data->jenis_pasien == 'umum' ? 'selected' : ''?> >Umum</option>
									</select>
									<div class="text-red-500 text-xs italic font-semibold">
										<?= form_error('jenis_pasien') ?>
									</div>
								</div> 
								<div class="col-span-2 hidden" id="no_jkn">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nomor Kartu JKN<span class="me-2 text-red-500">*</span></label>
									<input type="text" placeholder="Masukkan Nomor Kartu JKN" value="<?=$data->no_jkn?>" name="no_kartu_jkn" id="no_kartu_jkn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
									<div class="text-red-500 text-xs italic font-semibold">
										<?= form_error('no_kartu_jkn') ?>
									</div>
								</div>
								<div class="grid grid-cols-2 gap-3 col-span-3">
									<div>
										<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Tanggal Lahir<span class="me-2 text-red-500">*</span></label>
										<input type="text" placeholder="Masukkan Tanggal Lahir" value="<?=date('m-d-Y', strtotime($data->tanggal_lahir))?>" name="tgl_lahir" id="tgl_lahir" datepicker datepicker-format="mm-dd-yyyy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
										<div class="text-red-500 text-xs italic font-semibold">
											<?= form_error('tgl_lahir') ?>
										</div>
									</div>
									<div>
										<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Jenis Kelamin<span class="me-2 text-red-500">*</span></label>
										<select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
											<option value="" >Pilih Jenis Kelamin</option>
											<option value="l" <?=$data->jenis_kelamin == 'l' ? "selected" : ""?>>Laki-Laki</option>
											<option value="p" <?=$data->jenis_kelamin == 'p' ? "selected" : ""?>>Perempuan</option>
										</select>
										<div class="text-red-500 text-xs italic font-semibold">
											<?= form_error('jenis_kelamin') ?>
										</div>
									</div>
								</div>
								<div>
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Agama<span class="me-2 text-red-500">*</span></label>
									<select id="agama" name="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
										<option value="0">Pilih Agama</option>
										<option value="islam" <?=$data->agama == 'islam' ? "selected" : ""?> >Islam</option>
										<option value="kristen" <?=$data->agama == 'kristen' ? "selected" : ""?> >Kristen</option>
										<option value="katolik" <?=$data->agama == 'katolik' ? "selected" : ""?> >Katolik</option>
										<option value="hindu" <?=$data->agama == 'hindu' ? "selected" : ""?> >Hindu</option>
										<option value="buddha" <?=$data->agama == 'buddha' ? "selected" : ""?> >Buddha </option>
										<option value="khonghucu" <?=$data->agama == 'khonghucu' ? "selected" : ""?> >Khonghucu</option>
									</select>
								</div>
								<div>
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">No. Handphone<span class="me-2 text-red-500">*</span></label>
									<input type="text" placeholder="Masukkan No. Handphone" value="<?=$data->no_hp?>" name="no_hp" id="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
									<div class="text-red-500 text-xs italic font-semibold">
										<?= form_error('no_hp') ?>
									</div>
								</div>
								<div>
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">No. Telepon<span class="me-2 text-red-500">*</span></label>
									<input type="text" placeholder="Masukkan No. Telepon" value="<?=$data->no_telp?>" name="no_telp" id="no_telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
									<div class="text-red-500 text-xs italic font-semibold">
										<?= form_error('no_telp') ?>
									</div>
								</div>
								<div class="">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Status Kawin <span class="me-2 text-red-500">*</span></label>
									<select id="status_kawin" name="status_kawin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
										<option value="0">Pilih Status</option>
										<option value="1" <?=$data->status_pernikahan == '1' ? "selected" : "" ?> >Belum Menikah</option>
										<option value="2" <?=$data->status_pernikahan == '2' ? "selected" : "" ?> >Menikah</option>
										<option value="3" <?=$data->status_pernikahan == '3' ? "selected" : "" ?> >Duda</option>
										<option value="4" <?=$data->status_pernikahan == '4' ? "selected" : "" ?> >Janda</option>
									</select>
								</div>
								<div>
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Pendidikan <span class="me-2 text-red-500">*</span></label>
									<select id="pendidikan" name="pendidikan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
										<option value="0">Pilih Pendidikan</option>
										<option value="sltp" <?=$data->pendidikan == 'sltp' ? "selected" : "" ?> >SLTP</option>
										<option value="slta" <?=$data->pendidikan == 'slta' ? "selected" : "" ?> >SLTA</option>
										<option value="d1" <?=$data->pendidikan == 'd1' ? "selected" : "" ?> >D1</option>
										<option value="d4/s1" <?=$data->pendidikan == 'd4/s1' ? "selected" : "" ?> >D4/S1</option>
									</select>

								</div>
								<div>
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900" >Pekerjaan <span class="me-2 text-red-500">*</span></label>
									<input name="pekerjaan" type="text" placeholder="Masukkan Pekerjaan" value="<?=$data->pekerjaan?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
								</div>
								<div class="col-span-3">
									<label for="" class="block mb-2 text-sm font-semibold text-gray-900">Alamat<span class="me-2 text-red-500">*</span></label>
									<textarea name="alamat" id="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Alamat"><?=$data->alamat?></textarea>
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
		let jenis = $('#jenis_pasien').val();
		if (jenis == 'bpjs') {
			$('#no_jkn').removeClass('hidden');
		}else{
			$('#no_jkn').addClass('hidden');
		}
		$('#jenis_pasien').on('change', function() {
			if($(this).val() == 'bpjs') {
				$('#no_jkn').removeClass('hidden');
			}else{
				$('#no_jkn').addClass('hidden');
			}
		})
	</script>
</html>
