<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
	<div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
		<div class="flex items-center mb-4">
			<div>
				<img src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" class="w-20 h-20 rounded-full" alt="">
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
		<ul class="space-y-3 font-medium mt-5">
			<li>
				<a href="<?= base_url('dashboard') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
					<svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
						<path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
						<path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
					</svg>
					<span class="ms-3 text-sm">Dashboard</span>
				</a>
			</li>
			<hr>
			<li>
				<button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-700" aria-controls="master-data" data-collapse-toggle="master-data">
					<svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
						<path fill-rule="evenodd" d="M6 5a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L15.249 6H19a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2v-5a3 3 0 0 0-3-3h-3.22l-1.14-1.682A3 3 0 0 0 9.157 6H6V5Z" clip-rule="evenodd" />
						<path fill-rule="evenodd" d="M3 9a2 2 0 0 1 2-2h4.157a2 2 0 0 1 1.656.879L12.249 10H3V9Zm0 3v7a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-7H3Z" clip-rule="evenodd" />
					</svg>
					<span class="flex-1 text-sm ms-3 text-left rtl:text-right whitespace-nowrap">Master Data</span>
					<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
					</svg>
				</button>
				<ul id="master-data" class=" py-2 space-y-2 bg-gray-100 rounded mt-3 hidden">
					<li class="">
						<a href="<?= base_url('dashboard/user') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Data User
						</a>
					</li>
					<li class="">
						<a href="<?= base_url('dashboard/santri') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Data Santri
						</a>
					</li>
					<li class="">
						<a href="<?= base_url('dashboard/alumni') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Data Alumni
						</a>
					</li>
					<li class="">
						<a href="<?= base_url('dashboard/kategori') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Data Kategori Berita
						</a>
					</li>
					<li class="">
						<a href="<?= base_url('dashboard/berita') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Data Berita
						</a>
					</li>
					<li class="">
						<a href="<?= base_url('dashboard/jenis-transaksi') ?>" class="text-sm flex items-center w-full p-2 text-gray-900 transition duration-75 pl-4 group hover:bg-gray-200 dark:text-gray-900 dark:hover:bg-gray-700">
							<svg class="w-4 h-4 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4" />
							</svg>
							Data Jenis Transaksi
						</a>
					</li>


				</ul>
			</li>
			<hr>

			<li>
				<a href="<?= base_url('dashboard/visi-misi') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
					<svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
						<path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
						<path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
					</svg>
					<span class="ms-3 text-sm">Visi Misi</span>
				</a>
			</li>
		</ul>
	</div>
</aside>