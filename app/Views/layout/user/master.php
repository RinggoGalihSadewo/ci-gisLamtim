<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/logo/lampung-timur.png" type="image/x-icon">
    <link rel="icon" href="/img/logo/lampung-timur.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/vendor/user/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/user/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/vendor/user/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/vendor/user/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/vendor/user/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/vendor/user/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/css/user/main.css" rel="stylesheet">

    <!-- Leaflet JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="<?= base_url('/') ?>" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="/img/user/logo.png" alt=""> -->
                <h1>SiPakde</h1>
            </a>

            <?= $this->include('component/navbar'); ?>

        </div>
    </header><!-- End Header -->
    <!-- End Header -->

    <?= $this->renderSection('content') ?>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/vendor/user/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/user/purecounter/purecounter_vanilla.js"></script>
    <script src="/vendor/user/glightbox/js/glightbox.min.js"></script>
    <script src="/vendor/user/swiper/swiper-bundle.min.js"></script>
    <script src="/vendor/user/aos/aos.js"></script>
    <script src="/vendor/user/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/js/user/main.js"></script>

</body>

</html>