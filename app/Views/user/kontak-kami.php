<?= $this->extend('layout/user/master') ?>

<?= $this->section('content') ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('/img/user/kontak.jpg');">
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

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div>
                <iframe style="border:0; width: 100%; height: 340px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15888.444573013701!2d105.2711996!3d-5.4000339!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9dea7af8c4985f82!2sCinda%20Logika%20Grafia!5e0!3m2!1sid!2sid!4v1656995333317!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
            </div><!-- End Google Maps -->

            <div class="row gy-4 mt-4">

                <div class="col-lg-4">

                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>Location:</h4>
                            Villa Citra 2 blok G1 #16,
                            Jagabaya III, <br>
                            Sukabumi, Bandar Lampung City, Lampung 35113
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p>halo@cindalogikagrafia.com</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="col-lg-8">
                    <div class="my-3">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('pesan') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>
                    </div>
                    <form action="<?= base_url('kontak-kami') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="title" id="subject" placeholder="Judul" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="messages" rows="5" placeholder="Pesan" required></textarea>
                        </div>
                        <div class="text-center mt-3"><button class="btn btn-primary" type="submit">Kirim</button></div>
                    </form>

                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->

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