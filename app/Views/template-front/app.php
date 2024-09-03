<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="shortcut icon" href="<?= base_url("logo.jpg") ?>" type="image/x-icon">

    <!-- css  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <!-- fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <?= $this->include('template-front/_partials/topbar') ?>
    <main>
        <?= $this->renderSection('header') ?>
        <?= $this->renderSection('content') ?>

    </main>
    <?= $this->include('template-front/_partials/footer') ?>

</body>
<!-- js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('form').on('submit', function(event) {
            $('#loading-1').css({
                'z-index': '999',
            }).removeClass('hidden');
            $('#loading-2').css({
                'z-index': '9999',
            }).removeClass('hidden');
        });

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

</html>