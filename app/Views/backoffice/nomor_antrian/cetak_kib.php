<!DOCTYPE html>
<html lang="">
<head>
    <?php $this->load->view("template/_partials/head") ?>
    <style>
		#kartu_berobat {
			width: 600px;
		}
		.border{
			border-color: #000 !important;
		}
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }
            html, body {
                width: 210mm;
                height: 297mm;
                display: flex;
                justify-content: start; /* Mengatur konten berada di tengah secara horizontal */
                align-items: start; /* Mengatur konten berada di tengah secara vertikal */
            }
            .no-print, .no-print * {
                display: none !important;
            }
            .container {
                text-align: center; /* Mengatur teks berada di tengah */
            }
        }
		@page {
                size: A4 portrait; /* Mengatur orientasi halaman menjadi potret */
                margin: 0; /* Menghapus margin bawaan halaman */
        }
    </style>
</head>
<body class="text-gray-900">
<div class="">
    <div class="flex justify-end p-10">
        <button onclick="history.back()" class="me-3 mt-5 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 no-print"></i> Kembali</button>
    </div>
    <section class="">
        <div class="container card bg-white mt-4 border rounded-md m-4 text-center relative overflow-x-auto" id="kartu_berobat">
            <div>
                <span class="self-center text-xl font-bold sm:text-2xl whitespace-nowrap dark:text-white uppercase">Kartu berobat</span> <br>
                <span class="self-center text-xl font-bold sm:text-2xl whitespace-nowrap dark:text-white uppercase">Puskesmas kalisat</span> <br>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
				<tbody class="p-4 w-full">
					<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
						<td width="20%" class="p-4 uppercase">No.indeks(rm)</td>
						<td width="1%">:</td>
						<td class="font-bold"><?=$data->no_rm?></td>
					</tr>
					<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
						<td width="20%" class="p-4 uppercase">nik</td>
						<td width="1%">:</td>
						<td class="font-bold"><?=$data->nik?></td>
					</tr>
					<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
						<td width="20%" class="p-4 uppercase">No.bpjs</td>
						<td width="1%">:</td>
						<td class="font-bold"><?=$data->no_jkn != null ? $data->no_jkn : "-"?></td>
					</tr>
					<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
						<td width="20%" class="p-4 uppercase">nama</td>
						<td width="1%">:</td>
						<td class="font-bold"><?=ucwords($data->name)?></td>
					</tr>
					<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
						<td width="20%" class="p-4 uppercase">nama kk</td>
						<td width="1%">:</td>
						<td class="font-bold"><?=$data->no_kk?></td>
					</tr>
					<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
						<td width="20%" class="p-4 uppercase">tgl lahir</td>
						<td width="1%">:</td>
						<td class="font-bold"><?=date('m-d-Y', strtotime($data->tanggal_lahir))?></td>
					</tr>
					<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
						<td width="20%" class="p-4 uppercase">alamat</td>
						<td width="1%">:</td>
						<td class="font-bold"><?=$data->alamat?></td>
					</tr>
					<tr class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
						<td width="20%" class="p-4 uppercase">status</td>
						<td width="1%">:</td>
						<td class="font-bold"><?=$data->jenis_pasien?></td>
					</tr>
				</tbody>
			</table>
			<div class="border p-4 w-full">
				<span class="font-bold uppercase">wajib dibawa saat berobat di Puskesmas</span>

			</div>
        </div>
    </section>
</div>
</body>
<?php $this->load->view("template/_partials/script") ?>
<script>
    window.print();
</script>
</html>
