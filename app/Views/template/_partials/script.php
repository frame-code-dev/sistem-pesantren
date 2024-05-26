<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.tailwindcss.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <script src="editor/js/tinymce/tinymce.min.js"></script> -->
<script src="<?= base_url('editor/js/tinymce/tinymce.min.js') ?>"></script>

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

	function deleteConfirm(event) {
		console.log(event);
		Swal.fire({
			title: 'Delete Confirmation!',
			text: 'Are you sure to delete the item?',
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'No',
			confirmButtonText: 'Yes Delete',
			confirmButtonColor: 'red'
		}).then(dialog => {
			if (dialog.isConfirmed) {
				window.location.assign(event);
			}
		});
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
	$('#datatable').DataTable({
		"oLanguage": {
			"sEmptyTable": "Maaf data belum tersedia."
		},
	});
</script>