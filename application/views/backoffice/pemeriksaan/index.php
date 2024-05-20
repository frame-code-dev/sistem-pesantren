<!DOCTYPE html>
<html lang="">
    <head>
		<?php $this->load->view("template/_partials/head") ?>
    </head>
    <body class=" text-gray-900">
		
		<?php $this->load->view("template/_partials/topbar") ?>
		<?php $this->load->view("template/_partials/sidebar") ?>

		<div class="p-4 sm:ml-64">
			<div class="p-4 mt-14">
				<section class="p-5 overflow-y-auto mt-5">
					<div class="head lg:flex grid grid-cols-1 justify-between w-full">
						<div class="heading flex-auto">
							<p class="text-blue-950 font-sm text-xs">
								Pemeriksaan
							</p>
							<h2 class="font-bold tracking-tighter text-2xl text-theme-text">
								<?=$title?>
							</h2>
						</div>
					</div>
                    <div class="grid grid-cols-3 gap-4 mt-5">
                        <div class="container bg-red-400 p-5 mt-4 border rounded-md w-full relative overflow-x-auto center">
                            <div class="text-center text-white">
                                <p class="font-bold text-5xl"><?=$total_antrean?></p>
                                <div class="flex justify-center items-center mt-5">
                                    <span class="text-2xl">
                                        <a href="<?=base_url('pemeriksaan/list')?>" class="hover:underline">Jumlah Antrean Pasien</a>
                                    </span>
                                    <svg class="mt-1 w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="container bg-green-400 p-5 mt-4 border rounded-md w-full relative overflow-x-auto center">
                            <div class="text-center text-white">
                            <p class="font-bold text-5xl"><?=$total_diperiksa?></p>
                            <p class="text-2xl mt-5">Jumlah Pasien Yang Sedang Dilayani</p>
                            </div>
                        </div>
                        <div class="container bg-blue-400 p-5 mt-4 border rounded-md w-full relative overflow-x-auto center">
                            <div class="text-center text-white">
                            <p class="font-bold text-5xl"><?=$total_pasien_today?></p>
                            <p class="text-2xl mt-5">Jumlah Pasien Hari Ini</p>
                            </div>
                        </div>
                    </div>
				</section>
			</div>
		</div>
	</body>
	<?php $this->load->view("template/_partials/script") ?>

</html>
