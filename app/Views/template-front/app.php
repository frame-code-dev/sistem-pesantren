<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <!-- css  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <!-- fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('css/style.css')?>">
</head>
<body>
    <?=$this->include('template-front/_partials/topbar') ?>
    <main>
        <?=$this->renderSection('header')?>
        <?=$this->renderSection('content')?>
        
    </main>
    <?=$this->include('template-front/_partials/footer') ?>

</body>
    <!-- js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</html>