<?php $this->extend('template-front/app') ?>
<?=$this->section('header')?>
<header class="container p-5 mx-auto">
    <div class="relative isolate overflow-hidden py-24 sm:py-32 p-5 text-center">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center">
        <div class="space-y-2 flex flex-col">
            <div>
                <a href="#" class="inline-flex justify-between w-1/2 items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700" role="alert">
                    <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3 w-44">Selamat Datang</span>
                    <div class="scroll-container">
                        <div class="scrolling-text">Yayasan Pondok Pesantren Nurul Imamul Hasan adalah salah satu pondok pesantren yang moderen, dan ber distribusi dalam pendidikan islamiyah.</div>
                    </div>
                </a>

            </div>
            <span class="text-white font-semibold text-lg">اَلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَا تُهُ</span>
        </div>
        <div>
            <h1 class="mb-4 mt-5 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl dark:text-white"><span class="underline underline-offset-3 decoration-8 decoration-green-500 dark:decoration-green-600">YPP. Nurul Imamul Hasan </span></h1>
            <p class="text-white text-base font-medium leading-relaxed">JL. Tegal Wangkal, RT. 05, RW. 01, Kampung KrajanDesa Dawuhan, Suboh, Krajan, Suboh, Situbondo, Kabupaten Situbondo, Jawa Timur 68354, Situbondo 68354</p>
        </div>
    </div>
</header>
<?=$this->endSection()?>
<?=$this->section('content')?>
    <section class="bg-white dark:bg-gray-900">
        <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <img class="w-full dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/cta/cta-dashboard-mockup.svg" alt="dashboard image">
            <img class="w-full hidden dark:block" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/cta/cta-dashboard-mockup-dark.svg" alt="dashboard image">
            <div class="mt-4 md:mt-0">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Tentang Pesantren.</h2>
                <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">Flowbite helps you connect with friends and communities of people who share your interests. Connecting with your friends and family as well as discovering new ones is easy with features like Groups.</p>
                <a href="#" class="inline-flex items-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-green-900">
                    Get started
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        <div class="p-5 bg-green-600">
            <div class="mx-auto max-w-screen-xl">
                <h4 class="text-center font-bold text-2xl text-white">Motto : “Amal Ilmiyah, Ilmu Amaliyah, Akhlaqul Karimah Menggapai Ridho Allah”</h4>
                <p class="text-center text-sm mt-3 text-white">"Niscaya Allah akan meninggikan orang-orang yang beriman di antaramu dan orang-orang yang diberi ilmu pengetahuan beberapa derajat." (QS. 58 : 11)</p>
            </div>
        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Berita Terbaru</h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Temukan beragam berita mengenai Pesantren Imamul Hasan.</p>
            </div>
            <div class="grid gap-8 lg:grid-cols-2">
                <?php $i = 1 ?>
                <?php foreach ($berita as $d) : ?>
                    <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-between items-center mb-5 text-gray-500">
                                <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-800">
                                    <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                                <?=$d['kategori']?>
                                </span>
                                <span class="text-xs"><?= $d['created_at'] ?></span>
                            </div>
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:text-green-500"><a href=""><?=$d['judul']?>.</a></h2>
                                <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                                    <?= $d['keterangan'] ?>
                                </p>
                            </div>
                            <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <img class="w-7 h-7 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="" />
                                <span class="text-xs font-medium dark:text-white">
                                    <?=$d['username']?>
                                </span>
                            </div>
                            <a href=" " class="inline-flex items-center font-medium text-sm text-emerald-600 dark:text-emerald-500 hover:underline">
                                Read more
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    </article>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?=$this->endSection()?>
