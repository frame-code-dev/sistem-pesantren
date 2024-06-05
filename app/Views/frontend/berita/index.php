<?php $this->extend('template-front/app') ?>
<?=$this->section('header')?>
    <div class="bg-green-400 dark:bg-gray-800">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
            <div class="flex md:flex-row flex-col md:justify-between">
                <div>
                    <h2 class="md:mb-2 mb-0 text-lg md:text-4xl tracking-tight font-extrabold text-white dark:text-white text-center md:text-start">Berita Terkini</h2>
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
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Berita Terkini</span>
                        </div>
                    </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
<?=$this->endsection()?>
<?=$this->section('content')?>
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <form class="max-w-6xl mx-auto" method="GET" action="<?= base_url('berita') ?>">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500" placeholder="Masukkan kata kunci..." />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Search</button>
            </div>
        </form>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 content-center pt-16 px-4 md:px-0">
            <?php $i = 1 ?>
            <?php foreach ($berita['berita'] as $d) : ?>
                <div class="w-full md:max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="<?=base_url('berita/detail/'.$d['slug'])?>">
                        <img class="rounded-t-lg w-full bg-cover" src="<?=$d['image'] != null ? base_url("upload/" . $d["id"] . "/") . $d["image"] : 'https://flowbite.com/docs/images/examples/image-2@2x.jpg' ?>" alt="<?=$d['judul']?>" />
                    </a>
                    <div class="p-5">
                        <div class="flex justify-between items-center mb-5 text-gray-500 border-b-2 p-3">
                            <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-emerald-800">
                                <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                                <?=$d['kategori']?>
                            </span>
                            <span class="text-xs font-sans"><?=$d['created_at']?></span>
                        </div>
                        <a href="<?=base_url('berita/detail/'.$d['slug'])?>">
                            <h5 class="font-bold"><?=$d['judul']?></h5>
                        </a>
                        <div class="mt-4">
                            <p class="text-sm text-gray-500">
                                <?= $d['keterangan'] ?>
                            </p>
                        </div>
                        <div class="flex justify-end mt-4">
                            <a href="<?=base_url('berita/detail/'.$d['slug'])?>" class="inline-flex items-center text-yellow-400 hover:text-yellow-600 cursor-pointer focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
                                Lanjutkan Membaca
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="mt-5">
            <?= $berita['pager']->links('default') ?>
        </div>
    </div>
<?=$this->endsection()?>
