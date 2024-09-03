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
                    Santri
                </h2>
            </div>

            <div class="layout lg:flex grid grid-cols-1 lg:mt-0 mt-5 justify-end gap-5">
                <div class="button-wrapper gap-2 flex lg:justify-end">
                    <a href="<?= base_url('dashboard/santri/create') ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-3.5 h-3.5 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                        </svg>
                        Tambah Santri</a>
                </div>
            </div>
        </div>

        <div class="card bg-white border p-4 rounded-md mt-3">
            <div class="card-body  gap-2">
                <h1 class="mb-2 text-lg font-medium">Export santri</h1>
                <form action="/dashboard/santri/exportSantri" class="flex gap-2 items-end" method="get">
                    <div class="w-full">
                        <label class="mb-[1px] text-sm inline-block">Tahun Masuk</label>
                        <select name="tanggal_masuk" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <!-- <option value="" selected>Pilih tahun masuk</option> -->
                            <option value="*">Semua</option>
                            <?php foreach ($tahun_santri as $tahun) : ?>
                                <option value="<?= $tahun["year"] ?>"><?= $tahun["year"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="w-full">
                        <label class="mb-[1px] text-sm inline-block">Status Santri</label>
                        <select name="status_santri" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <!-- <option value="" selected>Pilih tahun masuk</option> -->
                            <option value="*">Semua</option>
                            <option value="aktif">Aktif</option>
                            <option value="belum_registrasi">Belum Registrasi</option>
                            <option value="belum_registrasi_ulang">Belum Registrasi Ulang</option>
                        </select>
                    </div>
                    <button style="text-wrap: nowrap;" class="text-white  bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Export excel</button>
                </form>
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
                        <th scope="col" class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($santri as $row) : ?>
                        <?php
                        $gender = $row['gender'];
                        if ($gender == 'l') {
                            $jenis_kelamin = "Laki-Laki";
                        } else {
                            $jenis_kelamin = "Perempuan";
                        }
                        $statusSantri = str_replace('_', ' ', $row['status_santri']);
                        $statusSantri = ucwords($statusSantri);
                        ?>
                        <tr>
                            <td class="px-4 py-3"><?= $no++ ?></td>
                            <td class="px-4 py-3"><?= esc($row['nis']) ?></td>
                            <td class="px-4 py-3"><?= esc($row['nama']) ?></td>
                            <td class="px-4 py-3"><?= $jenis_kelamin ?></td>
                            <td class="px-4 py-3"><?= esc($row['telepon']) ?></td>
                            <td class="px-4 py-3"><?= esc($statusSantri) ?></td>
                            <td class="px-4 py-3"><?= esc($row['tanggal_masuk']) ?></td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" href="<?= base_url('dashboard/santri/edit/' . $row['id']) ?>">
                                        Ubah
                                    </a>
                                    <button data-id="<?= $row["id"] ?>" data-modal-target="hapus default-modal" data-modal-toggle="default-modal" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" onclick="deleteConfirm('santri/delete/<?= $row['id'] ?>')" type="button">
                                        Hapus
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