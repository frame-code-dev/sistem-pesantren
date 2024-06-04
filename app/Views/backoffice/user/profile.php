<?php $this->extend('template/app') ?>
<?= $this->section('content') ?>

<div class="p-4 mt-14">
    <section class="p-5 overflow-y-auto">
        <div class="head lg:flex grid grid-cols-1 justify-between w-full">
            <div class="heading flex-auto">
                <p class="text-blue-950 font-sm text-xs">
                    Profile
                </p>
                <h2 class="font-bold tracking-tighter text-2xl text-theme-text">
                    Profile User
                </h2>
            </div>
            <div class="layout lg:flex grid grid-cols-1 lg:mt-0 mt-5 justify-end gap-5">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="<?= base_url('dashboard') ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="<?= base_url('dashboard/show') ?>" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Profile User</a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card bg-white p-5 mt-4 border rounded-md w-full relative">
            <form action="<?= base_url('profile-post') ?>" method="POST" class="w-full mx-auto space-y-4" enctype="multipart/form-data">
                <div class="grid grid-cols-4 gap-3">
                    <div class="col-span-2">
                        <img src="<?= base_url('default.jpg') ?>" style="width: 400px; height: 300px;" id="gambar" class="rounded mb-3" alt="">
                        <input accept="image/png, image/jpeg, image/jpg, image/webp" name="gambar" class="block w-full text-sm text-gray-900 border only-image limit-size-2 border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 image" type="file" data-target="#gambar">
                        <?php if (session("validation.gambar")) : ?>
                            <div class="text-red-500 text-sm">
                                <?= session("validation.gambar") ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="col-span-2">
                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Username<span class="me-2 text-red-500">*</span></label>
                        <input type="text" placeholder="Masukkan Username" name="username" value="<?= set_value("username", $data->username) ?>" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= set_value("username") ?>">
                        <div class="text-red-500 text-xs italic font-semibold">
                            <?php if (session("validation.username")) : ?>
                                <div class="text-red-500 text-sm">
                                    <?= session("validation.username") ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <label for="" class="mt-3 block mb-2 text-sm font-semibold text-gray-900">Nama<span class="me-2 text-red-500">*</span></label>
                        <input type="text" placeholder="Masukkan Nama" name="nama" value="<?= set_value("nama", $data->nama) ?>" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?= set_value("nama") ?>">
                        <div class="text-red-500 text-xs italic font-semibold">
                            <?php if (session("validation.nama")) : ?>
                                <div class="text-red-500 text-sm">
                                    <?= session("validation.nama") ?>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end align-middle content-center bg-gray-100 p-3 rounded-md">
                    <div>
                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Simpan</button>
                    </div>
                    <div>
                        <a href="<?= base_url("dashboard") ?>" class="bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" type="reset">Batal</a>
                    </div>

                </div>
            </form>
        </div>
    </section>
</div>

<?= $this->endsection() ?>