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
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/administrator') ?>">Administrator</a></li>
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
                    <button type="submit" href="<?= base_url('admin/administrator/add') ?>" class="btn btn-sm btn-success ml-2">Save <i class="fas fa-save"></i></button>
            </div>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
            <div class="row">
                <div class="col-4">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="<?= old('nik') ?>">
                </div>
                <div class="col-4">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama') ?>">
                </div>
                <div class="col-4">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <label for="password">Password</label>
                    <div class="row d-flex align-items-center inputPassword">
                        <div class="col-10">
                            <input type="password" class="form-control password" id="password" name="password">
                        </div>
                        <div class="col-2" id="eyeOpen1">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <label for="confirmPassword">Confirm Password</label>
                    <div class="row d-flex align-items-center inputPassword">
                        <div class="col-10">
                            <input type="password" class="form-control password" id="confirmPassword" name="confirmPassword">
                        </div>
                        <div class="col-2" id="eyeOpen2">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script>
    var eyeOpen1 = document.getElementById('eyeOpen1');
    var password = document.getElementById('password');

    eyeOpen1.addEventListener('click', function() {
        if (password.type === "text") {
            password.type = "password";
            eyeOpen1.innerHTML = '<i class="fas fa-eye"></i>';
        } else {
            password.type = "text";
            eyeOpen1.innerHTML = '<i class="fas fa-eye-slash"></i>';
        }

    });

    var eyeOpen2 = document.getElementById('eyeOpen2');
    var confirmPassword = document.getElementById('confirmPassword');

    eyeOpen2.addEventListener('click', function() {
        if (confirmPassword.type === "text") {
            confirmPassword.type = "password";
            eyeOpen2.innerHTML = '<i class="fas fa-eye"></i>';
        } else {
            confirmPassword.type = "text";
            eyeOpen2.innerHTML = '<i class="fas fa-eye-slash"></i>';
        }

    });
</script>

<!-- Summernote -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<?= $this->endSection() ?>