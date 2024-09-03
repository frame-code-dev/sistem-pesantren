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
            <div class="font-sm text-justify text-gray-500 leading-relaxed pb-4 w-full space-y-1  list-disc list-inside dark:text-gray-400">
                <?=$data->text?>
            </div>
        </div>
    </section>
<?=$this->endsection()?>