<?= $this->extend('layout/user/master') ?>

<?= $this->section('content') ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row gy-4 d-flex justify-content-between">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Peta Potensi Lampung Timur</h1>

                <div id="lat">

                </div>

                <p data-aos="fade-up" data-aos-delay="100">Sistem Peta Potensi Daerah Lampung Timur merupakan sebuah sistem informasi berbasis geografis yang memiliki beberapa kategori potensi didalamnya seperti Pariwisata, Kelautan dan Perikanan, Kerajinan Tangan (UKM), Perusahaan, UMKM, Pertanian dan Peternakan.</p>

                <form action="#" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
                    <input type="text" class="form-control" placeholder="Cari Perusahaan">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </form>

                <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="<?= $totalMap ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Perusahaan</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="<?= $totalCategory ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>kategori</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Kecamatan</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="<?= $totalMap ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Peta</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>
            </div>

            <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <div id="map" style="width: 100%; height: 55vh;" class="rounded"></div>
            </div>

        </div>
    </div>
</section><!-- End Hero Section -->

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

<script>

</script>

<?= $this->endSection() ?>