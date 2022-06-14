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
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/tentang-aplikasi') ?>">Tentang Aplikasi</a></li>
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
                    <button type="submit" href="<?= base_url('admin/tentang-aplikasi/add') ?>" class="btn btn-sm btn-success ml-2">Save <i class="fas fa-save"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" name="title">
                    <div class="mt-4">
                        <textarea id="summernote" name="content"></textarea>
                    </div>
                </div>
                <div class="col-4">
                    <label for="date">Date Publish</label>
                    <input type="date" id="date" class="form-control" name="date" value="<?= $today ?>">
                    <div class="mt-4">
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
                        <label for="desc">Descriptions</label>
                        <textarea class="form-control" name="desc" id="desc" rows="5"></textarea>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Summernote -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<?= $this->endSection() ?>