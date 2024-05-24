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
                    Data Santri
                </h2>
                </div>
            <div class="layout lg:flex grid grid-cols-1 lg:mt-0 mt-5 justify-end gap-5">
                <div class="button-wrapper gap-2 flex lg:justify-end">
                    <a href="<?= base_url('user/create') ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-3.5 h-3.5 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                        </svg>
                        Tambah Data</a>
                </div>
            </div>
        </div>

        <div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th scope="col" class="px-4 py-3">Nama</th>
                        <th scope="col" class="px-4 py-3">Username</th>
                        <th scope="col" class="px-4 py-3">HakAkses</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>
</div>
<?= $this->endsection() ?>