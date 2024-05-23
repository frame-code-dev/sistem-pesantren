<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.tailwindcss.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	function deleteConfirm(event){
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
			if(dialog.isConfirmed){
				window.location.assign(event);
			}
		});
	}
</script>

<?php if($this->session->flashdata('message')): ?>
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
			icon: 'success',
			title: '<?= $this->session->flashdata('message') ?>'
		})
	</script>
<?php endif ?>

<?php if($this->session->flashdata('error')): ?>
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
			title: '<?= $this->session->flashdata('error') ?>'
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
