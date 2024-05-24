<!DOCTYPE html>
<html lang="">

<head>
	<?php include(APPPATH . 'Views/template/_partials/head.php'); ?>
</head>

<body class=" text-gray-900">
	<?php include(APPPATH . 'Views/template/_partials/topbar.php'); ?>
	<?php include(APPPATH . 'Views/template/_partials/sidebar.php'); ?>
	<div class="p-4 sm:ml-64">

		<?= $this->renderSection('content') ?>

	</div>
</body>

<?php include(APPPATH . 'Views/template/_partials/script.php'); ?>

</html>