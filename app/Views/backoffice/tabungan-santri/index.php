<?php

use App\Helpers\Helpers;

$this->extend('template/app') ?>


<?= $this->section('content') ?>

<div class="p-4 mt-14">
	<section class="p-5 overflow-y-auto mt-5">

		<div class="head lg:flex grid grid-cols-1 justify-between w-full">
			<div class="heading flex-auto">
				<p class="text-blue-950 font-sm text-xs">
					Laporan
				</p>
				<h2 class="font-bold tracking-tighter text-2xl text-theme-text">
					Tabungan Santri
				</h2>
			</div>

		</div>
		<div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">
			<form action="" method="get" class="flex gap-2 items-end">
				<div class="w-full">
					<label for="santri" class="block mb-2 text-sm font-semibold text-gray-900">Filter Santri<span class="me-2 text-red-500">*</span></label>
					<select id="santri" name="santri" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
						<option disabled hidden selected value=""> == Pilih Santri == </option>

						<?php foreach ($santri as $str) : ?>
							<option <?= $str["id"] == $santriId  ? "selected" : "" ?> value="<?= $str["id"]  ?>"><?= $str["nama"] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Filter</button>
			</form>
		</div>
		<?php if ($filter) : ?>
			<div class="card bg-white p-5 mt-4 border rounded-md w-full relative overflow-x-auto">

			</div>

		<?php endif; ?>
	</section>
</div>



<!-- 

<script>
	$(".hapus").click(function() {
		$("#deleteModal").modal("show")
	})
</script> -->

<?= $this->endsection() ?>