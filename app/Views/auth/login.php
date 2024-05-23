<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
	<!-- css -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
	<!-- Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</head>

<body class="text-gray-900 antialiased ">
	<section class="bg-gray-50 dark:bg-gray-900 h-screen flex items-center justify-center">
		<div class="flex flex-col items-center justify-center px-6 mt-5 py-5 mx-auto w-1/2">

			<div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
				<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
					<a href="#" class="flex items-center mb-6 text-md font-semibold text-gray-900 dark:text-white">
						<img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
						CMS PESANTREN
					</a>
					<h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
						Masuk untuk melanjutkan
					</h1>
					<form class="space-y-4 md:space-y-6" action="#" method="POST">
						<?php if ($this->session->flashdata('message_login_error')) : ?>
							<div class="text-red-500 text-sm">
								<?= $this->session->flashdata('message_login_error') ?>
							</div>
						<?php endif ?>
						<div>
							<input type="text" id="username" name="username" value="<?= set_value('username') ?>" class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Username" required="">
							<div class="text-red-500 text-sm">
								<?= form_error('username') ?>
							</div>
						</div>
						<div>
							<input type="password" id="password" value="<?= set_value('password') ?>" name="password" placeholder="Masukkan Kata Sandi" class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 focus:bg-white block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
							<div class="text-red-500 text-sm">
								<?= form_error('password') ?>
							</div>
						</div>
						<div class="flex items-center justify-between">
							<div class="flex items-start">
								<div class="flex items-center h-5">
									<input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required="">
								</div>
								<div class="ml-3 text-sm">
									<label for="remember" class="text-gray-500 dark:text-gray-300">Ingat saya</label>
								</div>
							</div>
							<a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Lupa kata sandi?</a>
						</div>
						<button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masuk</button>
						<p class="text-sm font-light text-gray-500 dark:text-gray-400">
							Tidak memiliki akun? <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Daftar</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</section>

</body>

</html>