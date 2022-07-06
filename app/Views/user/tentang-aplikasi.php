<?= $this->extend('layout/user/master') ?>

<?= $this->section('content') ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('/img/user/page-header.jpg');">
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

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">
                <?php foreach ($post as $key) : ?>
                    <div class="col-12">
                        <h3 class="mb-3"><?= $key['title'] ?></h3>
                        <?= $key['content'] ?>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </section><!-- End About Us Section -->

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