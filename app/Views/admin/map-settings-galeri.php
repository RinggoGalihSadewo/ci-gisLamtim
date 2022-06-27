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
                    <li class="breadcrumb-item active" aria-current="page">Galeri Foto</li>
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
        <div class="card-header py-3">
            <a href="<?= base_url('admin/map-settings/edit/' . $post['post_id']) . '/galeri-foto/upload' ?>" class="btn btn-sm btn-secondary">Upload foto lainnya</a>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sort</th>
                            <th>Image</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($galeri as $key) : ?>
                            <tr>
                                <td><?= $key['sort'] ?></td>
                                <td><img src="/img/admin/map/galeri/<?= $key['image'] ?>" alt="" width="200px" height="100px"></td>
                                <td><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-<?= $key['post_id'] ?>">Delete</button></td>
                            </tr>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="delete-<?= $key['post_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Item Confirm</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-warning" role="alert">
                                                <b>Peringatan !</b> Anda yakin ingin menghapus data ini ?
                                                <form action="<?= base_url('admin/map-settings/edit/' . $key['post_id'] . '/galeri-foto/delete') ?>">
                                                    <input type="hidden" value="<?= $post['post_id'] ?>" name="post_id">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="" class="btn btn-sm btn-danger" data-dismiss="modal">No <i class="fas fa-ban"></i></a>
                                            <button type="submit" href="" class="btn btn-sm btn-success">Yes <i class="fas fa-check"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>