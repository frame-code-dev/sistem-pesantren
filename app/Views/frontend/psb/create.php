<?php $this->extend('template-front/app') ?>
<?= $this->section('header') ?>
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
                        <a href="<?= base_url('/') ?>" class="inline-flex items-center text-sm font-medium text-gray-900 hover:text-green-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li class="inline-flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="<?= base_url('/berita') ?>" class="inline-flex items-center text-sm font-medium text-gray-900 hover:text-green-600 dark:text-gray-400 dark:hover:text-white">
                            Berita
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Berita Terkini</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<section class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
    <div class="grid grid-cols-1 gap-4">
        <div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
            <div class="mb-5 p-3 bg-green-800">
                <h4 class="font-bold uppercase text-white"><?= $title ?></h4>
                <hr>
            </div>
            <div>
                <form action="<?= base_url('psb/create/store') ?>" method="POST" class="w-full mx-auto space-y-4" enctype="multipart/form-data">
                    <p class="font-bold">Data Diri : </p>
                    <hr class="border ">
                    <div class="grid grid-cols-4 gap-3">
                        <div class="col-span-2">
                            <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nis<span class="me-2 text-red-500">*</span></label>
                            <input type="text" max="12" value="<?= set_value("nis") ?>" placeholder="Masukkan Nis" name="nis" id="nis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" maxlength="10">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.nis")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.nis") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nama<span class="me-2 text-red-500">*</span></label>
                            <input type="text" value="<?= set_value("nama") ?>" placeholder="Masukkan Nama" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.nama")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.nama") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nisn<span class="me-2 text-red-500">*</span></label>
                            <input type="text" max="10" value="<?= set_value("nisn") ?>" placeholder="Masukkan nisn" name="nisn" id="nisn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.nisn")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.nisn") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nik Santri<span class="me-2 text-red-500">*</span></label>
                            <input type="text" max="16" value="<?= set_value("nik_santri") ?>" placeholder="Masukkan Nik Santri" name="nik_santri" id="nik_santri" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.nik_santri")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.nik_santri") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Tempat Lahir<span class="me-2 text-red-500">*</span></label>
                            <input type="text" value="<?= set_value("tempat_lahir") ?>" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" id="tempat_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.tempat_lahir")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.tempat_lahir") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="" class="block mb-2 text-sm font-semibold text-gray-900">No KK<span class="me-2 text-red-500">*</span></label>
                            <input type="text" max="16" value="<?= set_value("no_kk") ?>" placeholder="Masukkan No KK" name="no_kk" id="no_kk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.no_kk")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.no_kk") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="telepon" class="block mb-2 text-sm font-semibold text-gray-900">Telepon<span class="me-2 text-red-500">*</span></label>
                            <input type="text" value="<?= set_value("telepon") ?>" placeholder="Masukkan Telepon" name="telepon" id="telepon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.telepon")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.telepon") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="gender" class="block mb-2 text-sm font-semibold text-gray-900">Jenis Kelamin<span class="me-2 text-red-500">*</span></label>
                            <select id="gender" value="<?= set_value("gender") ?>" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value=""> == Pilih Gender == </option>
                                <option value="l">Laki Laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.gender")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.gender") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="tanggal_lahir" class="block mb-2 text-sm font-semibold text-gray-900">Tanggal Lahir<span class="me-2 text-red-500">*</span></label>
                            <input type="date" value="<?= set_value("tanggal_lahir") ?>" name="tanggal_lahir" id="tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.tanggal_lahir")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.tanggal_lahir") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="tanggal_masuk" class="block mb-2 text-sm font-semibold text-gray-900">Tanggal Masuk<span class="me-2 text-red-500">*</span></label>
                            <input type="date" value="<?= set_value("tanggal_masuk") ?>" name="tanggal_masuk" id="tanggal_masuk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.tanggal_masuk")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.tanggal_masuk") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-3">
                            <label for="alamat" class="block mb-2 text-sm font-semibold text-gray-900">Alamat<span class="me-2 text-red-500">*</span></label>
                            <textarea name="alamat" placeholder="Masukkan Data..." id="alamat" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"><?= set_value("alamat") ?></textarea>
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.alamat")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.alamat") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <p class="font-bold">Data Orang Tua : </p>
                    <hr class="border ">
                    <div class="grid grid-cols-4 gap-3">
                        <div class="col-span-2">
                            <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nama Ibu<span class="me-2 text-red-500">*</span></label>
                            <input type="text" value="<?= set_value("nama_ibu") ?>" placeholder="Masukkan Nama Ibu" name="nama_ibu" id="nama_ibu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" maxlength="10">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.nama_ibu")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.nama_ibu") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nik Ibu<span class="me-2 text-red-500">*</span></label>
                            <input type="text" max="16" value="<?= set_value("nik_ibu") ?>" placeholder="Masukkan Nik Ibu" name="nik_ibu" id="nik_ibu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" maxlength="10">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.nik_ibu")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.nik_ibu") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nama Ayah<span class="me-2 text-red-500">*</span></label>
                            <input type="text" value="<?= set_value("nama_ayah") ?>" placeholder="Masukkan Nama Ayah" name="nama_ayah" id="nama_ayah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" maxlength="10">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.nama_ayah")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.nama_ayah") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="" class="block mb-2 text-sm font-semibold text-gray-900">Nik Ayah<span class="me-2 text-red-500">*</span></label>
                            <input type="text" max="16" value="<?= set_value("nik_ayah") ?>" placeholder="Masukkan Nik Ayah" name="nik_ayah" id="nik_ayah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" maxlength="10">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.nik_ayah")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.nik_ayah") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <p class="font-bold">File Santri : </p>
                    <hr class="border ">
                    <div class="grid grid-cols-4 gap-3">
                        <div class="col-span-2">
                            <img src="" id="image" class="rounded" alt="">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto Santri</label>

                            <input accept="image/png, image/jpeg, image/jpg, image/webp" required name="image" class="block w-full text-sm text-gray-900 border only-image limit-size-2 border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 image" type="file" data-target="#image">
                            <?php if (session("validation.image")) : ?>
                                <div class="text-red-500 text-sm">
                                    <?= session("validation.image") ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-span-2">
                            <img src="" id="foto_kk" class="rounded" alt="">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto KK</label>

                            <input accept="image/png, image/jpeg, image/jpg, image/webp" required name="foto_kk" class="block w-full text-sm text-gray-900 border only-image limit-size-2 border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 image" type="file" data-target="#foto_kk">
                            <?php if (session("validation.foto_kk")) : ?>
                                <div class="text-red-500 text-sm">
                                    <?= session("validation.foto_kk") ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-span-2">
                            <img src="" id="foto_akte" class="rounded" alt="">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto Akte</label>

                            <input accept="image/png, image/jpeg, image/jpg, image/webp" required name="foto_akte" class="block w-full text-sm text-gray-900 border only-image limit-size-2 border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 image" type="file" data-target="#foto_akte">
                            <?php if (session("validation.foto_akte")) : ?>
                                <div class="text-red-500 text-sm">
                                    <?= session("validation.foto_akte") ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-span-2">
                            <img src="" id="foto_ijazah" class="rounded" alt="">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto Ijazah</label>

                            <input accept="image/png, image/jpeg, image/jpg, image/webp" required name="foto_ijazah" class="block w-full text-sm text-gray-900 border only-image limit-size-2 border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 image" type="file" data-target="#foto_ijazah">
                            <?php if (session("validation.foto_ijazah")) : ?>
                                <div class="text-red-500 text-sm">
                                    <?= session("validation.foto_ijazah") ?>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-span-2">
                            <img src="" id="foto_skhu" class="rounded" alt="">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto SKHU</label>

                            <input accept="image/png, image/jpeg, image/jpg, image/webp" required name="foto_skhu" class="block w-full text-sm text-gray-900 border only-image limit-size-2 border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 image" type="file" data-target="#foto_skhu">
                            <?php if (session("validation.foto_skhu")) : ?>
                                <div class="text-red-500 text-sm">
                                    <?= session("validation.foto_skhu") ?>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="flex justify-end align-middle content-center bg-gray-100 p-3 rounded-md">
                        <div>
                            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Simpan</button>
                        </div>
                        <div>
                            <a href="<?= base_url('dashboard/santri') ?>" class="bg-white text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" type="reset">Batal</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endsection() ?>