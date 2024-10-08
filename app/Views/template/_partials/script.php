<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.tailwindcss.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- select 2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- <script src="editor/js/tinymce/tinymce.min.js"></script> -->
<script src="<?= base_url('editor/js/tinymce/tinymce.min.js') ?>"></script>



<!-- tab pane tabungan santri -->
<script>
	$(document).ready(function() {
		$(".overlay").hide();
		$(".loading-container").hide();
	})
	$(".tab  .tab-item").on("click", function() {
		const classActive = ["bg-blue-600", "rounded-lg", "active", "text-white"];
		const classNonActive = ["hover:text-gray-900", "hover:bg-gray-100", "dark:hover:bg-gray-800", "dark:hover: text-white"];
		$idTabContent = $(this).attr("data-tabId");
		$(".tab-content").addClass("hidden");
		$($idTabContent).removeClass("hidden");
		$("")

		$(".tab-item").addClass(classNonActive);
		$(".tab-item").removeClass(classActive);
		$(this).addClass(classActive);
		$(this).removeClass(classNonActive);
		const titleAdd = $(this).attr("data-modalAddTitle");
		const titleEdit = $(this).attr("data-modalEditTitle");
		const kategori = $(this).attr("data-kategori");
		$("#tabungan-santri-modal .modal-title").text(titleAdd);
		$("#tabungan-santri-modal-edit .modal-title").text(titleEdit);
		$("#tabungan-santri-modal [name=kategori]").val(kategori);
	})


	function updateTabunganSantri(url, el) {
		const tanggal = $(el).attr("data-tanggal");
		const nominal = $(el).attr("data-nominal");
		$("#tabungan-santri-modal-edit form").attr("action", url)
		$("#tabungan-santri-modal-edit [name=nominal]").val(nominal)
		$("#tabungan-santri-modal-edit [name=tanggal]").val(tanggal)
	}

	function addTabunganSantri() {
		$("[name=nominal]").val(nominal)
		$("[name=tanggal]").val(tanggal)
	}
</script>


<script>
	$(document).ready(function() {
		// Set session menu active on click
		$(".sidebar-menu a").on("click", function() {
			const url = $(this).attr("href");
			sessionStorage.setItem("sidebar-active", url);
		});

		// Get the current URL
		const route = $(location).attr("href");
		const classActive = ["bg-gray-200", "dark:bg-gray-700"];
		let bestMatchElement = null;
		let bestMatchLength = 0;

		// Find the best match URL
		$(".sidebar-menu").each(function() {
			const url = $(this).find("a").attr("href");

			// Check if the current route includes the URL from the sidebar menu
			if (route.includes(url) && url.length > bestMatchLength) {
				bestMatchElement = $(this);
				bestMatchLength = url.length;
			}
		});

		// Highlight the best match
		if (bestMatchElement) {
			bestMatchElement.find("a").addClass(classActive); // Add active classes

			// Show the current active menu and hide siblings
			bestMatchElement.parent().removeClass("hidden");
			bestMatchElement.parent().parent().find("ul").addClass("hidden");
			bestMatchElement.parent().removeClass("hidden");
		}
	});
</script>
<!-- 
<script>
	//set session menu active
	$(".sidebar-menu").on("click", function() {
		const url = $(this).find("a").attr("href");
		sessionStorage.setItem("sidebar-active", url)
	})

	//show if have menu active
	$(".sidebar-menu").each(function() {
		const classActive = ["bg-gray-200", "dark:bg-gray-700"];
		const urlActive = sessionStorage.getItem("sidebar-active")
		const route = $(location).attr("href");
		const url = $(this).find("a").attr("href");
		if (route.includes(url)) {
			$(this).find("a").addClass(classActive);
			$(this).parent().parent().find("ul").addClass("hidden");
			$(this).parent().removeClass("hidden");
		}
	})
</script> -->
<!-- text editor code -->
<script>
	tinymce.init({
		selector: 'textarea#editor',
		height: 500,
		plugins: [
			'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
			'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
			'insertdatetime', 'media', 'table', 'help', 'wordcount'
		],
		toolbar: 'undo redo | blocks | ' +
			'bold italic backcolor | alignleft aligncenter ' +
			'alignright alignjustify | bullist numlist outdent indent | ' +
			'removeformat | help',
		content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
	});
	setTimeout(() => {
		$(".tox-promotion").hide();
	}, 500);
</script>
<script>
	$(document).ready(function() {
		$('#text').addClass('hidden');
		$('#img').addClass('hidden');
		$('form').on('submit', function(event) {
			$('#loading-1').css({
				'z-index': '999',
			}).removeClass('hidden');
			$('#loading-2').css({
				'z-index': '9999',
			}).removeClass('hidden');

			$('#text').removeClass('hidden');
			$('#img').removeClass('hidden');
		});

		$('.select2').select2();

		$('.limit-size-2').on('change', function() {
			var size = (this.files[0].size / 1024 / 1024).toFixed(2)
			if (size > 2) {
				errorImage('Ukuran maksimal berkas adalah 2 MB');
			}
		})

		$(".only-image").on('change', function() {
			if (!this.files[0].type.includes('image')) {
				errorImage('Hanya boleh memilih file berupa gambar(.jpg, .jpeg, .png, .webp)');
			}
		})

		$('#image').on('change', function(event) {
			const file = event.target.files[0];
			const imagePreview = $('#imagePreview');

			if (file) {
				const reader = new FileReader();

				reader.onload = function(e) {
					imagePreview.attr('src', e.target.result);
					imagePreview.show();
				}

				reader.readAsDataURL(file);
			} else {
				imagePreview.attr('src', '');
				imagePreview.hide();
			}
		});
		$('.image').on('change', function(event) {
			const file = event.target.files[0];
			const target = $(this).data('target');
			const imagePreview = $(`${target}`);

			if (file) {
				const reader = new FileReader();

				reader.onload = function(e) {
					imagePreview.attr('src', e.target.result);
					imagePreview.css({
						'width': '400px',
						'height': '300px'
					});
					imagePreview.show();
				}

				reader.readAsDataURL(file);
			} else {
				imagePreview.attr('src', '');
				imagePreview.hide();
			}
		});
	});

	var rupiahs = document.querySelectorAll('.rupiah');

	rupiahs.forEach(function(rupiah) {
		rupiah.addEventListener('keyup', function(e) {
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			this.value = formatRupiah(this.value, 'Rp. ');
		});
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}

	if (document.getElementById("telepon")) {
		// validasi telepon
		document.getElementById('telepon').addEventListener('input', function(e) {
			this.value = this.value.replace(/\D/g, '');

			// Limit the length to 13 digits
			if (this.value.length > 13) {
				this.value = this.value.slice(0, 13);
			}
		});

		document.getElementById('telepon').addEventListener('keydown', function(e) {
			// Allow control keys such as backspace, delete, arrow keys, etc.
			const controlKeys = ['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab', 'Escape'];
			if (controlKeys.includes(e.key)) {
				return;
			}
			// Prevent default action if the key is not a digit or if the length exceeds 13
			if (!/^\d$/.test(e.key) || this.value.length >= 13) {
				e.preventDefault();
			}
		});
	}

	function deleteConfirm(event) {
		console.log(event);
		Swal.fire({
			title: 'Konfirmasi hapus data!',
			text: 'Apakah anda yakin ingin menghapus data ini?',
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonText: 'Hapus',
			confirmButtonColor: 'red',
			cancelButtonColor: 'gray'
		}).then(dialog => {
			if (dialog.isConfirmed) {
				window.location.assign(event);
			}
		});
	}

	function updateAlumni(event) {
		console.log(event);
		Swal.fire({
			title: 'Konfirmasi aktifkan santri!',
			text: 'Apakah anda yakin mengaktifkan santri ini?',
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Batal',
			confirmButtonText: 'Aktifkan',
			confirmButtonColor: 'red'
		}).then(dialog => {
			if (dialog.isConfirmed) {
				window.location.assign(event);
			}
		});
	}

	function errorImage(message) {
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})

		Toast.fire({
			icon: 'error',
			title: message
		})
	}
</script>
<?php
$session = \Config\Services::session();
$status_error = $session->get('status_error');
$status_success = $session->get('status_success');
?>
<?php if ($status_success) : ?>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				title: <?= json_encode($session->getFlashdata('message')) ?>
			})
		});
	</script>
<?php endif; ?>
<?php if ($status_error) : ?>
	<script>
		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})

		Toast.fire({
			icon: 'error',
			title: '<?= $session->getFlashdata('error') ?>'
		})
	</script>
<?php endif ?>
<script>
	// Datatable
	$('#datatable,.datatable').DataTable({
		"oLanguage": {
			"sEmptyTable": "Maaf data belum tersedia."
		},
	});
</script>