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
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('admin/map-settings') ?>">Map Settings</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url('admin/map-settings/category') ?>">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
                    <div class="btn-group ml-auto">
                        <a href="" class="btn btn-sm btn-secondary" onClick="window.location.reload();"><i class="fas fa-sync"></i> Refresh</a>
                        <a href="<?= base_url('admin/map-settings/category/add') ?>" class="btn btn-sm btn-secondary ml-2"><i class="fas fa-plus"></i> Add New</a>
                    </div>
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
                                    <th>Actions</th>
                                    <th>Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($category as $key) : ?>
                                    <tr>
                                        <td>
                                            <div class="btn-group dropright">
                                                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-cog"></i> Action
                                                </button>
                                                <div class="dropdown-menu pl-2 ml-3">
                                                    <!-- Dropdown menu links -->
                                                    <a href="<?= base_url('admin/map-settings/category/edit/' . $key['category_id']) ?>"><i class="far fa-edit"></i> Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="" data-toggle="modal" data-target="#delete-<?= $key['category_id'] ?>"><i class="far fa-trash-alt"></i> Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $key['title'] ?></td>
                                    </tr>
                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="delete-<?= $key['category_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="" class="btn btn-sm btn-danger" data-dismiss="modal">No <i class="fas fa-ban"></i></a>
                                                    <a href="<?= base_url('/admin/category/delete/' . $key['category_id']) ?>" class="btn btn-sm btn-success">Yes <i class="fas fa-check"></i></a>
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
        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Form Category Map</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <?php $validation = \Config\Services::validation() ?>
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" onchange="previewImg()">
                        <img src="/img/default-image.jpg" class="mt-3 img-preview" alt="" width="100%">
                        <small>Recomended dimention 1:1 and max filesize 2.0MB</small>
                        <div class="mt-2">
                            <label for="title">Title</label>
                            <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : '' ?>" id="title" name="title" value="<?= old('title') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('title') ?>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="desc">Description</label>
                            <textarea class="form-control" name="desc" id="desc" cols="30" rows="2"><?= old('desc') ?></textarea>
                        </div>

                </div>
                <div class="card-footer">
                    <div>
                        <a href="javascript:history.back()" class="btn btn-sm btn-secondary">Back <i class="fa fa-arrow-left"></i></a>
                        <button type="submit" class="btn btn-sm btn-success">Save <i class="fas fa-save"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <?= $this->endSection() ?>