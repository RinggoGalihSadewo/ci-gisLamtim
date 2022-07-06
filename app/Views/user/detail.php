<?= $this->extend('layout/user/master') ?>

<?= $this->section('content') ?>

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
                <li><a href="<?= base_url('/peta') ?>">Peta</a></li>
                <li><?= $title ?></li>
            </ol>
        </div>
    </nav>
</div><!-- End Breadcrumbs -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex">
    <div class="container">
        <div class="row gy-4 d-flex">
            <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="400">
                <h2><?= $maps['title'] ?></h2>
                <iframe src="https://maps.google.com/maps?q=<?= $others->latitude ?>,<?= $others->longitude ?>&amp;output=embed&amp;z=15" frameborder="0" style="width: 100%; height: 500px;" class="mt-3"></iframe>
                <div class="mt-3">
                    <h4>Deskripsi Singkat</h4>
                    <?= $others->description ?>
                </div>
            </div>
            <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <?php if ($slider == null) : ?>
                    <img src="/img/admin/map/cover/<?= $maps['image'] ?>" alt="" class="img-fluid">
                <?php endif  ?>
                <?php if ($slider != null) : ?>
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php $i = 0; ?>
                            <?php foreach ($slider as $key) : ?>
                                <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                    <img src="/img/admin/map/galeri/<?= $key['image'] ?>" class="d-block w-100" height="300px" alt="...">
                                </div>
                                <?php $i++; ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endif ?>

                <iframe src="<?= $others->youtube ?>" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" __idm_id__="237569" class="w-100 my-4" style="height: 250px"></iframe>
                <div>
                    <h5>Alamat</h5>
                    <p><?= $others->address ?></p>
                </div>
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

<?= $this->endSection() ?>