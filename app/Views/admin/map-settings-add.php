<?= $this->extend('layout/admin/master') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-1" style="display: flex; justify-content: center; margin-top: 0.75rem">
            <a href="javascript:history.back();">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
        <div class="col-11">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/map-settings') ?>">Map Settings</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            <div class="btn-group ml-auto">
                <a href="javascript:history.back();" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                <form action="" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <?php $validation = \Config\Services::validation(); ?>
                    <button type="submit" class="btn btn-sm btn-success ml-2">Save <i class="fas fa-save"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="col-8">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : '' ?>" name="title" value="<?= old('title') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('title') ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="date">Date Publish</label>
                            <input type="date" id="date" class="form-control" name="date" value="<?= $today ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <?php foreach ($category as $key) : ?>
                                    <option value="<?= $key['category_id'] ?>"><?= $key['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="kec">Kecamatan</label>
                            <select name="kec" id="kec" class="form-control">
                                <option value="test">test</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4" style="width: 100%; height: 400px" id="map">
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="lat">Latitude</label>
                            <input type="text" class="form-control" id="lat" name="lat">
                        </div>
                        <div class="col-6">
                            <label for="lng">Longitude</label>
                            <input type="text" class="form-control" id="lng" name="lng">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="summornote">Deskripsi</label>
                        <textarea id="summernote" name="desc"><?= old('content') ?></textarea>
                    </div>
                </div>
                <div class="col-4">
                    <div>
                        <label for="status">Status</label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" name="status" id="flexRadioDefault1" value="draft" />
                            <label class="custom-control-label" for="flexRadioDefault1"> Draft </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" name="status" id="flexRadioDefault2" value="publish" />
                            <label class="custom-control-label" for="flexRadioDefault2"> Publish </label>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="photo">Cover</label>
                        <input type="file" class="form-control" name="cover" id="photo" onchange="previewImg()" />
                        <img src="/img/default-image.jpg" alt="" class="img img-thumbnail mt-3 img-preview">
                        <small>Recomended dimention 768x432 pixel and max filesize 2.0MB</small>
                    </div>
                    <div class="mt-2">
                        <label for="yt">Video Link Youtube</label>
                        <input type="text" class="form-control" name="yt" id="yt" />
                    </div>
                    <div class="mt-2">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="7"></textarea>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script>
    document.getElementById('lat').value = -5.2749;
    document.getElementById('lng').value = 105.6882;

    var map = L.map('map').setView([-5.2749, 105.6882], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© Cinda Logika Grafia',
        draggable: true
    }).addTo(map);

    var marker = L.marker(new L.LatLng(-5.2749, 105.6882), {
        draggable: true
    }).addTo(map);

    marker.on('dragend', function(e) {
        document.getElementById('lat').value = marker.getLatLng().lat;
        document.getElementById('lng').value = marker.getLatLng().lng;
    });


    // var theMarker = {};

    // function onMapClick(e) {
    //     var lat = e.latlng.lat;
    //     var lng = e.latlng.lng;
    //     marker = new L.marker(e.latlng, {
    //         draggable: 'true'
    //     });

    //     marker.on('dragend', function(event) {
    //         var marker = event.target;
    //         var position = marker.getLatLng();
    //         marker.setLatLng(new L.LatLng(position.lat, position.lng), {
    //             draggable: 'true'
    //         });
    //         map.panTo(new L.LatLng(position.lat, position.lng))
    //     });

    //     if (theMarker != undefined) {
    //         map.removeLayer(theMarker);
    //     };

    //     theMarker = L.marker([lat, lng]).addTo(map);

    //     document.getElementById('lat').value = e.latlng.lat;
    //     document.getElementById('lng').value = e.latlng.lng;
    // };

    // map.on('click', onMapClick)
</script>

<?= $this->endSection() ?>