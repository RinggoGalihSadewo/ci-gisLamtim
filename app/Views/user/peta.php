<?= $this->extend('layout/user/master') ?>

<?= $this->section('content') ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('/img/user/map.jpg'); background-position: 100% 100%;">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2><?= $title ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="<?= base_url('/') ?>">Beranda</a></li>
                    <li><?= $title ?></li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row gy-4 d-flex justify-content-between align-items-center">
                <div class="col-lg-4 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">
                        <?php foreach ($category as $key) : ?>
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-<?= $key['category_id'] ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                            <?= $key['title'] ?>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne-<?= $key['category_id'] ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <?php foreach ($places as $place) : ?>
                                            <?php if ($place['category_title'] === $key['title']) : ?>
                                                <div class="accordion-body"><a href="<?= base_url('/peta/' . $place['post_slug']) ?>"><?= $place['title_post'] ?></a></div>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="col-lg-8 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <div id="map" style="width: 100%; height: 55vh;" class="rounded"></div>
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
                <a href="https://www.cindalogikagrafia.com" target="_blank" class="logo d-flex align-items-center">
                    <span>Cinda Logika Grafia</span>
                </a>
                <a href="https://www.cindalogikagrafia.com" target="_blank" class="text-white">cindalogikagrafia.com</a>
                <div class="social-links d-flex mt-4">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <?php foreach ($menu as $key) : ?>
                        <li><a href="<?= $key['url'] ?>" target="<?= $key['target'] ?>"><?= $key['title'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#">IT Consultion</a></li>
                    <li><a href="#">Construction</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contact Us</h4>
                <p>
                    Villa Citra 2 blok G1 #16, <br>
                    Jagabaya III,<br>
                    Sukabumi, Bandar Lampung City, Lampung 35113 <br><br>
                    <strong>Phone:</strong> +1 5589 55488 55<br>
                    <strong>Email:</strong> halo@cindalogikagrafia.com<br>
                </p>

            </div>

        </div>
    </div>

    <div class="container mt-4">
        <div class="copyright">
            &copy; Copyright <strong><span>Cinda Logika Grafia</span></strong>. All Rights Reserved
        </div>
    </div>

</footer><!-- End Footer -->
<!-- End Footer -->

<script>
    var map = L.map('map').setView([-5.2749, 105.6882], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© Cinda Logika Grafia',
        draggable: true
    }).addTo(map);

    <?php foreach ($latLng as $key) : ?>
        L.marker(new L.LatLng(<?= $key[0] ?>, <?= $key[1] ?>)).addTo(map).bindPopup(
            "<div style='width: auto; height: auto; padding: 10px'><?= $key[2] ?><div><div class='mt-2'><img src='/img/admin/map/cover/<?= $key[3] ?>' class='img-fluid'/></div><div class='mt-2'><?= $key[5] ?></div><a href='<?= base_url('/peta/' . $key['4']) ?>' class='btn btn-sm mt-2 btn-primary text-white'>Detail</h5></a></div></div>"
        );
    <?php endforeach; ?>
</script>

<?= $this->endSection() ?>