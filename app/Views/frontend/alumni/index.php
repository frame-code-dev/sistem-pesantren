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
                <h4 class="font-bold uppercase text-white"><?=ucwords($title)?></h4>
                <hr>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 content-center pt-16 px-4 md:px-0">
                    <?php $no = 1;
                    foreach ($data as $row) : ?>
                        <?php
                        $gender = $row['gender'];
                        if ($gender == 'l') {
                            $jenis_kelamin = "Laki-Laki";
                        } else {
                            $jenis_kelamin = "Perempuan";
                        }
                        ?>
                        <div class="w-full md:max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <img class="rounded-t-lg w-full bg-cover" src="<?=$row['image'] != 'default.jpg' || $row['image'] == null  ? base_url("upload/" . $row["id"] . "/") . $row["image"] : 'https://flowbite.com/docs/images/examples/image-2@2x.jpg'?>">
                            <div class="p-4">
                                <div class="mb-3 text-center">
                                    <h4 class="font-bold text-gray-900 text-center"><?= esc($row['nama']) ?></h4>
                                    <span class="text-xs text-gray-700 text-center"><?=$jenis_kelamin?></span>
                                    <hr>
                                </div>
                                <div class="flex justify-center gap-4 text-gray-500 text-sm">
                                    <div class="inline-flex items-center">
                                        <div>
                                            <svg class="w-5 h-5 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                                            </svg>

                                        </div>
                                        <div class="ml-2">
                                            <span class="text-xs"><?= esc($row['tanggal_lahir'] != null ? $row['tanggal_lahir'] : '-') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600"><?= esc($row['motto'] != null ? $row['motto'] : '-') ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
            </div>
        </div>
    </section>
<?=$this->endsection()?>