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
                    <li class="breadcrumb-item active" aria-current="page">Pop Up Manager</li>
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
                    <button class="btn btn-sm btn-secondary ml-auto" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Add New</button>
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
                    <?php if (session()->getFlashdata('pesan2')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('pesan2') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Pop Up Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($popup as $key) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $key['title'] ?></td>
                                        <td><img src="/img/admin/popup/<?= $key['value'] ?>" alt="" width="100px"></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit-<?= $key['popup_id'] ?>"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-<?= $key['popup_id'] ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="edit-<?= $key['popup_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Item Confirm</h5>
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
                                                    <a href="<?= base_url('/admin/popup-manager/edit/' . $key['popup_id']) ?>" class="btn btn-sm btn-success">Yes <i class="fas fa-check"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="delete-<?= $key['popup_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <a href="<?= base_url('/admin/popup-manager/delete/' . $key['popup_id']) ?>" class="btn btn-sm btn-success">Yes <i class="fas fa-check"></i></a>
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
        <!-- Modal Add -->
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Pop Up</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div>
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="<?= old('title') ?>">
                            </div>
                            <div class="mt-3">
                                <label for="title">Gambar Pop Up</label>
                                <input type="file" class="form-control" name="photo" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-sm btn-danger" data-dismiss="modal">No <i class="fas fa-ban"></i></a>
                        <button type="submit" class="btn btn-sm btn-success">Yes <i class="fas fa-check"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Pop Up Active</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PATCH">

                        <?php foreach ($imgActive as $img) : ?>
                            <input type="text" value="<?= $img['popup_id'] ?>">
                            <img src="/img/admin/popup/<?= $img['value'] ?>" class="mt-3 img-preview" alt="" width="100%">
                        <?php endforeach; ?>
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="mt-2">
                            <label for="desc">Pop Up Active</label>
                            <select name="select" id="" class="form-control">
                                <?php foreach ($popup as $key) : ?>
                                    <option value="active" <?= $key['status'] === 'active' ? 'selected' : '' ?>><?= $key['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
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