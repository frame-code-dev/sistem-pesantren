<?php $this->extend('template/app') ?>
<?= $this->section('content') ?>
<div class="p-4 mt-14">
    <section class="p-5 overflow-y-auto mt-5">
        <div class="head lg:flex grid grid-cols-1 justify-between w-full">
            <div class="heading flex-auto">
                <p class="text-blue-950 font-sm text-xs">
                    Master Data
                </p>
                <h2 class="font-bold tracking-tighter text-2xl text-theme-text">
                    Alumni
                </h2>
            </div>
            <div class="layout lg:flex grid grid-cols-1 lg:mt-0 mt-5 justify-end gap-5">
                <div class="button-wrapper gap-2 flex lg:justify-end">
                    <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        <svg class="w-3.5 h-3.5 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                        </svg>
                        Tambah Alumni
                    </button>
                </div>
            </div>
        </div>

        <div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th scope="col" class="px-4 py-3">Nis</th>
                        <th scope="col" class="px-4 py-3">Nama</th>
                        <th scope="col" class="px-4 py-3">Jenis Kelamin</th>
                        <th scope="col" class="px-4 py-3">Telepon</th>
                        <th scope="col" class="px-4 py-3">Status Santri</th>
                        <th scope="col" class="px-4 py-3">Tanggal Masuk</th>
                        <th scope="col" class="px-4 py-3">Tanggal Keluar</th>
                        <th scope="col" class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($alumni as $row) : ?>
                        <?php
                        $gender = $row['gender'];
                        if ($gender == 'l') {
                            $jenis_kelamin = "Laki-Laki";
                        } else {
                            $jenis_kelamin = "Perempuan";
                        }
                        ?>
                        <tr>
                            <td class="px-4 py-3"><?= $no++ ?></td>
                            <td class="px-4 py-3"><?= esc($row['nis']) ?></td>
                            <td class="px-4 py-3"><?= esc($row['nama']) ?></td>
                            <td class="px-4 py-3"><?= $jenis_kelamin ?></td>
                            <td class="px-4 py-3"><?= esc($row['telepon']) ?></td>
                            <td class="px-4 py-3"><?= esc($row['status_santri']) ?></td>
                            <td class="px-4 py-3"><?= esc($row['tanggal_masuk']) ?></td>
                            <td class="px-4 py-3"><?= esc($row['tanggal_keluar']) ?></td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <button data-id="<?= $row["id"] ?>" data-modal-target="hapus default-modal" data-modal-toggle="default-modal" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" onclick="updateAlumni('alumni/update/<?= $row['id'] ?>')" type="button">
                                        Aktifkan Santri
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<?= $this->endsection() ?>

<?= $this->section('content') ?>
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Data Alumni
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="<?= base_url('dashboard/alumni/add') ?>" method="POST" class="w-full mx-auto space-y-4" enctype="multipart/form-data">
                <div class="p-4 md:p-5 space-y-4">
                    <div class="grid grid-cols-4 gap-3">
                        <div class="col-span-2">
                            <label for="santri" class="block mb-2 text-sm font-semibold text-gray-900">Santri<span class="me-2 text-red-500">*</span></label>
                            <select id="santri" name="santri" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled hidden selected value=""> == Pilih Santri == </option>
                                <?php foreach ($santri as $row) : ?>
                                    <option value="<?= set_value("santri", $row['id']) ?>"> <?= $row['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.santri")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.santri") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="tanggal_keluar" class="block mb-2 text-sm font-semibold text-gray-900">Tanggal Keluar<span class="me-2 text-red-500">*</span></label>
                            <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.tanggal_keluar")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.tanggal_keluar") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="col-span-4">
                            <label for="motto" class="block mb-2 text-sm font-semibold text-gray-900">Tanggal Keluar<span class="me-2 text-red-500">*</span></label>
                            <textarea name="motto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" id=""></textarea>
                            <div class="text-red-500 text-xs italic font-semibold">
                                <?php if (session("validation.motto")) : ?>
                                    <div class="text-red-500 text-sm">
                                        <?= session("validation.motto") ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="static-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    <button data-modal-hide="static-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                </div>
            </form>
            <!-- Modal footer -->
        </div>
    </div>
</div>
<?= $this->endSection() ?>