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
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('admin/map-settings/edit/' . $post['post_id']) ?>">Edit</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('admin/map-settings/edit/' . $post['post_id']) . '/galeri-foto' ?>">Galeri Foto</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Upload Foto</li>
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
            </div>
        </div>
        <div class="card-body">
            <form action="<?= base_url('/admin/map-settings/edit/' . $post['post_id'] . '/galeri-foto/upload') ?>" method="POST" enctype="multipart/form-data" class="dropzone" id='image-upload'>
                <div>
                    <h3 class="text-center">Upload Image Here</h3>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script type="text/javascript">
    Dropzone.options.imageUpload = {
        maxFilesize: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
    };
</script>

<?= $this->endSection() ?>