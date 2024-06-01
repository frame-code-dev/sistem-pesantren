<?php $this->extend('template-front/app') ?>
<?=$this->section('header')?>
    <div class="bg-green-400 dark:bg-gray-800">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
            <div class="flex md:flex-row flex-col md:justify-between">
                <div>
                    <h2 class="md:mb-2 mb-0 text-lg md:text-4xl tracking-tight font-extrabold text-white dark:text-white text-center md:text-start"><?=ucwords($title)?></h2>
                    <h2 class="text-gray-900 dark:text-white font-sm text-xs text-start md:font-medium">YPP. Nurul Imamul Hasan</h2>
                </div>
                <nav class="flex justify-center my-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="<?=base_url('/')?>" class="inline-flex items-center text-sm font-medium text-gray-900 hover:text-green-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"><?=ucwords($title)?></span>
                        </div>
                    </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
<?=$this->endsection()?>
<?=$this->section('content')?>
    <section class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
            <div class="mb-5 p-3 bg-green-800">
                <h4 class="font-bold uppercase text-white">Sejarah singkat berdirinya pesantren</h4>
                <hr>
            </div>
            <p class="font-sm text-justify text-gray-500 leading-relaxed pb-4">
                Akhir-akhir ini masyarakat berpendapat bahwa, dengan Ilmu Pengetahuan dan Teknologi, suatu bangsa akan terangkat dari kemiskinan dan keterbelakangan. Namun disisi lain tanpa kita sadari, kemajuan Ilmu Pengetahuan dan Teknologi telah mengikis nilai-nilai ajaran agama dan kultur sosial di masyarakat. Sehingga tidak jarang anak-anak kita terjerumus kedalam pergaulan bebas dan dekadensi moral yang berakibat pada kenakalan remaja. Fenomena ini sangat bertolak belakang antara harapan dengan realita yang sangat memprihatinkan bagi agama dan bangsa. Oleh karenanya, kita hendaknya cakap dan cermat dalam memilih dan menilai serta mendesain pendidikan masa depan yang kita cita-citakan. Untuk tercapainya tujuan pendidikan islam yang memberdayakan, maka perlu adanya upaya Penanaman nilai-nilai aqidah dan penerapan akhlakul karimah serta peningkatan Sumber Daya Manusia Muslim (SDMM) yang didasari oleh Iman dan Taqwa (IMTAQ) serta keluasan IPTEK. Dengan demikian, kita tetap dapat memelihara serta menjalan nilai-nilai ajaran al-Qur'an serta Sunnah Rasul.
            </p>
            <p class="font-sm text-justify text-gray-500 leading-relaxed pb-4">
                Pondok Pesantren merupakan salah satu lembaga pendidikan Islam tertua di Indonesia yang telah mewujudkan kemampuannya dalam mencetak generasi muslim serta kader-kader ulama dan telah berjasa turut mencerdaskan masyarakat Indonesia. Disamping itu Pondok Pesantren telah menjadi pusat pendidikan yang telah berhasil menanamkan semangat kewiraswastaan, semangat kemandirian dan tidak menggantungkan diri kepada orang lain. Sebagai lembaga pendidikan, Pondok Pesantren memiliki potensi dan pengaruh yang cukup besar di dalam masyarakat. Tentunya modal tersebut perlu dimanfaatkan serta dibina secara terarah dalam rangka ikut andil mewujudkan kader umat yang beriman dan bertaqwa, berilmu, berakhlak, cakap, terampil dan mempunyai kepribadian luhur.
            </p>
            <p class="font-sm text-justify text-gray-500 leading-relaxed pb-4">
                Bertitik tolak dari kondisi serta kenyataan tersebut diatas, maka sebagai tokoh serta kader ulama yang peduli terhadap pendidikan moral generasi muslim, TUHPAUTUL MARDIYAH merasa terpanggil untuk ikut serta mendidik, mengayomi dan memperhatikan banyaknya minat masyarakat dilingkungan sekitar serta kepercayaan para peziarah ke makam NURUL IMAMUL HASAN, untuk mendirikan lembaga pendidikan agama, yaitu Pondok Pesantren.

            </p>
        </div>
    </section>
<?=$this->endsection()?>