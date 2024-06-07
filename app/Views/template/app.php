<!DOCTYPE html>
<html lang="">

<head>
	<?php include(APPPATH . 'Views/template/_partials/head.php'); ?>
</head>

<body class=" text-gray-900">
	<style>
		.overlay {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.7) !important;
		}

		.loading-container {
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			display: flex;
			align-items: center;
			justify-content: center;
		}
	</style>
	<div class="overlay hidden" id="loading-1"></div>
	<div class="loading-container space-x-2 hidden d-none" id="loading-2">
		<img src="<?= base_url('loading.svg') ?>" alt="" id="img" class="hidden w-20">
		<div class="hidden" id="text">
			<p class="text-4xl font-medium text-white">Loading...</p>
			<p class="text-4xl font-medium text-white">Data Sedang Di Proses.</p>
		</div>
	</div>
	<?php include(APPPATH . 'Views/template/_partials/topbar.php'); ?>
	<div class="p-4 sm:ml-64">
		<?= $this->renderSection('modal') ?>

		<?= $this->renderSection('content') ?>
	</div>

	<?php include(APPPATH . 'Views/template/_partials/sidebar.php'); ?>
</body>
<?php include(APPPATH . 'Views/template/_partials/script.php'); ?>

</html>