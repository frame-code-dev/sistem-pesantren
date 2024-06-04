<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
	<div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
		<div class="flex items-center mb-4">
			<div>
				<?php
				$session = \Config\Services::session();
				$user_id = $session->get('user_id');
				$image = $session->get('image');
				?>
				<?php if ($image) : ?>
					<img src="<?= base_url("upload/image/". $user_id . "/" . $image) ?>" class="w-20 h-20 rounded-full" alt="">
				<?php else : ?>
					<img src="<?= base_url('user.jpg') ?>" class="w-20 h-20 rounded-full" alt="">
				<?php endif; ?>
			</div>
			<div class="ms-4">
				<?php
				$session = \Config\Services::session();
				$name = $session->get('name');
				$username = $session->get('username');
				?>
				<h4 class="font-bold text-lg"><?= $name ?></h4>
				<p class="text-xs"><?= $username ?></p>
			</div>
		</div>
		<hr>
		<ul class="space-y-3 font-medium mt-5 sidebar">
			<li class="sidebar-menu">
				<a href="<?= base_url('dashboard') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

					<svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
						<path d="M5 3a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5Zm14 18a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h4ZM5 11a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2H5Zm14 2a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h4Z" />
					</svg>

					<span class="ms-3 text-sm">Dashboard</span>
				</a>
			</li>
			<hr>
			<li>
				<button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-700" aria-controls="master-data" data-collapse-toggle="master-data">
					<svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
						<path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
					</svg>

					<span class="flex-1 text-sm ms-3 text-left rtl:text-right whitespace-nowrap">Master Data</span>
					<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
					</svg>
				</button>
				<ul id="master-data" class=" py-2 space-y-2 bg-gray-100 rounded mt-3 hidden">
					<li class="sidebar-menu">
						<a href="<?= base_url('dashboard/user') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							User
						</a>
					</li>
					<li class="sidebar-menu">
						<a href="<?= base_url('dashboard/santri') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Santri
						</a>
					</li>
					<li class="sidebar-menu">
						<a href="<?= base_url('dashboard/alumni') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Alumni
						</a>
					</li>
					<li class="sidebar-menu">
						<a href="<?= base_url('dashboard/kategori') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Kategori Berita
						</a>
					</li>
					<li class="sidebar-menu">
						<a href="<?= base_url('dashboard/berita') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Berita
						</a>
					</li>
					<li class="sidebar-menu">
						<a href="<?= base_url('dashboard/jenis-transaksi') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Jenis Transaksi
						</a>
					</li>


				</ul>
			</li>
			<hr>
			<li>
				<button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-700" aria-controls="keuangan" data-collapse-toggle="keuangan">
					<svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
						<path fill-rule="evenodd" d="M4 5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H4Zm0 6h16v6H4v-6Z" clip-rule="evenodd" />
						<path fill-rule="evenodd" d="M5 14a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm5 0a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
					</svg>

					<span class="flex-1 text-sm ms-3 text-left rtl:text-right whitespace-nowrap">Pemasukan</span>
					<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
					</svg>
				</button>
				<ul id="keuangan" class=" py-2 space-y-2 bg-gray-100 rounded mt-3 hidden">
					<li class="sidebar-menu">
						<a href="<?= base_url('dashboard/pendaftaran') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Pendaftaran
						</a>
					</li>
					<li class="sidebar-menu">
						<a href="<?= base_url('dashboard/pendaftaran-ulang') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Pendaftaran Ulang
						</a>
					</li>
					<li class="sidebar-menu">
						<a href="<?= base_url('dashboard/bulanan') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Pembayaran Bulanan
						</a>
					</li>
					<li class="sidebar-menu">
						<a href="<?= base_url('dashboard/tabungan-santri') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Tabungan Santri
						</a>
					</li>
				</ul>
			</li>
			<hr>
			<li class="sidebar-menu">
				<a href="<?= base_url('dashboard/pengeluaran') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
					<svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
						<path fill-rule="evenodd" d="M4 5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H4Zm0 6h16v6H4v-6Z" clip-rule="evenodd" />
						<path fill-rule="evenodd" d="M5 14a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2H6a1 1 0 0 1-1-1Zm5 0a1 1 0 0 1 1-1h5a1 1 0 1 1 0 2h-5a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
					</svg>

					<span class="ms-3 text-sm">Pengeluaran</span>
				</a>
			</li>
			<hr>
			<li>
				<button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-700" aria-controls="laporan" data-collapse-toggle="laporan">
					<svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 10v-2m3 2v-6m3 6v-3m4-11v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
					</svg>

					<span class="flex-1 text-sm ms-3 text-left rtl:text-right whitespace-nowrap">Laporan</span>
					<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
					</svg>
				</button>
				<ul id="laporan" class=" py-2 space-y-2 bg-gray-100 rounded mt-3 hidden">
					<li class="sidebar-menu">
						<a href="<?= base_url('dashboard/laporan-bulanan') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Laporan Bulanan
						</a>
					</li>
					<li class="sidebar-menu">
						<a href="<?= base_url('dashboard/laporan-tahunan') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Laporan Tahunan
						</a>
					</li>

				</ul>
			</li>
			<hr>
			<li class="sidebar-menu">
				<a href="<?= base_url('dashboard/visi-misi') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
					<svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
					</svg>

					<span class="ms-3 text-sm">Visi Misi</span>
				</a>
			</li>
			<hr>
			<li class="sidebar-menu">
				<a href="<?= base_url('dashboard/peraturan') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
					<svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
					</svg>

					<span class="ms-3 text-sm">Peraturan</span>
				</a>
			</li>
			<hr>
		</ul>
	</div>
</aside>