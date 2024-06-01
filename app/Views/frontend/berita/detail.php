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
                    <li class="inline-flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="<?=base_url('/berita')?>" class="inline-flex items-center text-sm font-medium text-gray-900 hover:text-green-600 dark:text-gray-400 dark:hover:text-white">
                            Berita
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
<section class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="p-4 space-y-4 mb-5">
            <h2 class="text-4xl font-bold text-gray-800 text-center"> <?=$detail['judul']?></h2>
            <div class="flex justify-center gap-4 text-gray-500 text-sm p-5">
                <div class="inline-flex items-center">
                    <div>
                        <svg class="w-5 h-5 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M7 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h1m4-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm7.441 1.559a1.907 1.907 0 0 1 0 2.698l-6.069 6.069L10 19l.674-3.372 6.07-6.07a1.907 1.907 0 0 1 2.697 0Z"/>
                          </svg>
                    </div>
                    <div class="ml-2">
                        <span><?=$detail['username']?></span>
                    </div>
                </div>
                <div class="inline-flex items-center">
                    <div>
                        <svg class="w-5 h-5 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                          </svg>

                    </div>
                    <div class="ml-2">
                        <span><?=$detail['created_at']?></span>
                    </div>
                </div>
            </div>
            <div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
                <div class="w-fit">
                    <img src="<?=$detail['image'] != null ? base_url("upload/" . $detail["id"] . "/") . $detail["image"] : 'https://flowbite.com/docs/images/examples/image-2@2x.jpg' ?>" class="h-auto w-1/2 rounded-lg mx-auto" alt="<?=$detail['judul']?>">
                </div>
                <div class="md:p-10 p-4 lead text-gray-500 leading-loose">
                    <?=$detail['content']?>
                </div>
            </div>
        </div>
</section>
<?=$this->endsection()?>
