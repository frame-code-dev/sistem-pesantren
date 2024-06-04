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

			<div class="w-1/2 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
				<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
					<a href="#" class="flex items-center mb-6 text-md font-semibold text-gray-900 dark:text-white">
						<img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
						CMS PESANTREN
					</a>
					<h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
						Masuk untuk melanjutkan
					</h1>
					<form class="space-y-4 md:space-y-6" action="<?= route_to('loginPost') ?>" method="POST">
						<?php if (session()->has('message_login_error')) : ?>
							<div class="text-red-500 text-sm">
								<?= session('message_login_error') ?>
							</div>
						<?php endif ?>
						<div>
							<input type="text" id="username" name="username" value="<?= set_value('username') ?>" class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Username" required="">
							<?php if (isset($validation) && $validation->hasError('username')) : ?>
								<div class="text-red-500 text-sm">
									<?= $validation->getError('username') ?>
								</div>
							<?php endif ?>
						</div>

						<div class="relative mb-6">
							<div class="absolute inset-y-0 end-0 flex items-center pe-3.5 " style="cursor: pointer;">
								<svg class="w-6 eye-show h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
									<path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
									<path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
								</svg>
								<svg class="w-6 h-6 hidden eye-hide text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
									<path d="m4 15.6 3.055-3.056A4.913 4.913 0 0 1 7 12.012a5.006 5.006 0 0 1 5-5c.178.009.356.027.532.054l1.744-1.744A8.973 8.973 0 0 0 12 5.012c-5.388 0-10 5.336-10 7A6.49 6.49 0 0 0 4 15.6Z" />
									<path d="m14.7 10.726 4.995-5.007A.998.998 0 0 0 18.99 4a1 1 0 0 0-.71.305l-4.995 5.007a2.98 2.98 0 0 0-.588-.21l-.035-.01a2.981 2.981 0 0 0-3.584 3.583c0 .012.008.022.01.033.05.204.12.402.211.59l-4.995 4.983a1 1 0 1 0 1.414 1.414l4.995-4.983c.189.091.386.162.59.211.011 0 .021.007.033.01a2.982 2.982 0 0 0 3.584-3.584c0-.012-.008-.023-.011-.035a3.05 3.05 0 0 0-.21-.588Z" />
									<path d="m19.821 8.605-2.857 2.857a4.952 4.952 0 0 1-5.514 5.514l-1.785 1.785c.767.166 1.55.25 2.335.251 6.453 0 10-5.258 10-7 0-1.166-1.637-2.874-2.179-3.407Z" />
								</svg>
							</div>
							<input type="password" id="password" value="<?= set_value('password') ?>" name="password" placeholder="Masukkan Kata Sandi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pe-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
							<?php if (isset($validation) && $validation->hasError('password')) : ?>
								<div class="text-red-500 text-sm">
									<?= $validation->getError('password') ?>
								</div>
							<?php endif ?>

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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<script>
		$(".eye-show").click(function() {
			$(this).addClass("hidden");
			$(".eye-hide").removeClass("hidden");
			$("#password").attr("type", "text")
		})
		$(".eye-hide").click(function() {
			$(this).addClass("hidden");
			$(".eye-show").removeClass("hidden");
			$("#password").attr("type", "password")

		})
	</script>
</body>

</html>