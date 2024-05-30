<!DOCTYPE html>
<html lang="">

<head>
	<?php include(APPPATH . 'Views/template/_partials/head.php'); ?>
</head>

<body class=" text-gray-900">
	<?php include(APPPATH . 'Views/template/_partials/topbar.php'); ?>
	<?php include(APPPATH . 'Views/template/_partials/sidebar.php'); ?>
	<div class="p-4 sm:ml-64">
		<div id="loading-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
			<div class="relative p-4 w-full max-w-2xl max-h-full">
				<!-- Modal content -->
				<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
					<div class="p-4 md:p-5 space-y-4">
						<div class="grid grid-cols-4 gap-3">
							<div class="col-span-4">
								<p>Loading...</p>
							</div>
							<div class="col-span-4">
								<img src="<?= base_url('public/assets/loading.svg') ?>" class="rounded-md w-24" alt="">
							</div>
							<div class="col-span-4">
								<p>Data sedang diprogress</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?= $this->renderSection('modal') ?>

		<?= $this->renderSection('content') ?>

	</div>
</body>

<?php include(APPPATH . 'Views/template/_partials/script.php'); ?>

</html>