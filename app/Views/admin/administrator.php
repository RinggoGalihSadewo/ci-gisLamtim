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
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            <div class="btn-group ml-auto">
                <a href="" class="btn btn-sm btn-secondary" onClick="window.location.reload();"><i class="fas fa-sync"></i> Refresh</a>
                <a href="<?= base_url('admin/administrator/add') ?>" class="btn btn-sm btn-secondary ml-2"><i class="fas fa-plus"></i> Add New</a>
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
                            <th>Action</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($administrator as $key) : ?>
                            <tr>
                                <td>
                                    <div class="btn-group dropright">
                                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-cog"></i> Action
                                        </button>
                                        <div class="dropdown-menu pl-2 ml-3">
                                            <!-- Dropdown menu links -->
                                            <a href="<?= base_url('admin/administrator/edit/' . $key['admin_id']) ?>"><i class="far fa-edit"></i> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="" data-toggle="modal" data-target="#delete-<?= $key['admin_id'] ?>"><i class="far fa-trash-alt"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>
                                <td><?= $key['nik'] ?></td>
                                <td><?= $key['nama'] ?></td>
                                <td><?= $key['username'] ?></td>
                            </tr>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="delete-<?= $key['admin_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <a href="<?= base_url('/admin/administrator/delete/' . $key['admin_id']) ?>" class="btn btn-sm btn-success">Yes <i class="fas fa-check"></i></a>
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