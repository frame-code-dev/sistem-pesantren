<!DOCTYPE html>
<html lang="">
<head>
    <?php $this->load->view("template/_partials/head") ?>
    <style>
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }
            html, body {
                width: 210mm;
                height: 297mm;
                display: flex;
                justify-content: center; /* Mengatur konten berada di tengah secara horizontal */
                align-items: center; /* Mengatur konten berada di tengah secara vertikal */
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
        <div class="container card bg-white p-5 mt-4 border rounded-md w-full mx-auto text-center relative overflow-x-auto">
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
    </section>
</div>
</body>
<?php $this->load->view("template/_partials/script") ?>
<script>
    window.print();
</script>
</html>
